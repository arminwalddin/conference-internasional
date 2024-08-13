<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use app\InvitedSpeaker;
use App\Http\Requests\StoreInvitedSpeakerRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvitedSpeakerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ispeaker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ispeaker = InvitedSpeaker::all();

        return view('admin.ispeaker.index', compact('ispeaker'));
    }

    public function create()
    {
        abort_if(Gate::denies('ispeaker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ispeaker.create');
    }

    public function store(StoreInvitedSpeakerRequest $request)
    {
        $ispeaker = InvitedSpeaker::create($request->all());

        if ($request->input('photo', false)) {
            $ispeaker->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.ispeaker.index');
    }

    public function edit(InvitedSpeaker $ispeaker)
    {
        abort_if(Gate::denies('ispeaker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ispeaker.edit', compact('ispeaker'));
    }

    public function update(UpdateInvitedSpeakerRequest $request, InvitedSpeaker $ispeaker)
    {
        $ispeaker->update($request->all());

        if ($request->input('photo', false)) {
            if (!$ispeaker->photo || $request->input('photo') !== $ispeaker->photo->file_name) {
                $ispeaker->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($ispeaker->photo) {
            $ispeaker->photo->delete();
        }

        return redirect()->route('admin.ispeaker.index');
    }

    public function show(InvitedSpeaker $ispeaker)
    {
        abort_if(Gate::denies('ispeaker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ispeaker.show', compact('ispeaker'));
    }

    public function destroy(InvitedSpeaker $ispeaker)
    {
        abort_if(Gate::denies('ispeaker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ispeaker->delete();

        return back();
    }
    public function massDestroy(MassDestroyInvitedSpeakerRequest $request)
    {
        InvitedSpeaker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
