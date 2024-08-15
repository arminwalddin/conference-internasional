<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Commite;
use App\Http\Requests\MassDestroyCommiteRequest;
use App\Http\Requests\StoreCommiteRequest;
use App\Http\Requests\UpdateCommiteRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommiteController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('speaker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commite = Commite::all();

        return view('admin.commite.index', compact('commite'));
    }

    public function create()
    {
        abort_if(Gate::denies('commite_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.commite.create');
    }

    public function store(StoreCommiteRequest $request)
    {
        $commite = Commite::create($request->all());

        if ($request->input('photo', false)) {
            $commite->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.commite.index');
    }

    public function edit(Commite $commite)
    {
        abort_if(Gate::denies('commite_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.commite.edit', compact('commite'));
    }

    public function update(UpdateCommiteRequest $request, Commite $commite)
    {
        $commite->update($request->all());

        if ($request->input('photo', false)) {
            if (!$commite->photo || $request->input('photo') !== $commite->photo->file_name) {
                $commite->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($commite->photo) {
            $commite->photo->delete();
        }

        return redirect()->route('admin.commite.index');
    }

    public function show(Commite $commite)
    {
        abort_if(Gate::denies('commite_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.commite.show', compact('commite'));
    }

    public function destroy(Commite $commite)
    {
        abort_if(Gate::denies('commite_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commite->delete();

        return back();
    }
    public function massDestroy(MassDestroyCommiteRequest $request)
    {
        Commite::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
