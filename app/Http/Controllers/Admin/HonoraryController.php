<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySpeakerRequest;
use App\Http\Requests\StoreSpeakerRequest;
use App\Http\Requests\UpdateSpeakerRequest;
use App\Honorary;
use App\Http\Requests\StoreHonoraryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HonoraryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('speaker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $honorary = Honorary::all();

        return view('admin.honorary.index', compact('honorary'));
    }

    public function create()
    {
        abort_if(Gate::denies('honorary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.honorary.create');
    }

    public function store(StoreHonoraryRequest $request)
    {
        $honorary = Honorary::create($request->all());

        if ($request->input('photo', false)) {
            $honorary->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.honorary.index');
    }

    public function edit(Honorary $honorary)
    {
        abort_if(Gate::denies('honorary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.honorary.edit', compact('honorary'));
    }

    public function update(UpdateHonoraryRequest $request, Honorary $honorary)
    {
        $honorary->update($request->all());

        if ($request->input('photo', false)) {
            if (!$honorary->photo || $request->input('photo') !== $honorary->photo->file_name) {
                $honorary->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($honorary->photo) {
            $honorary->photo->delete();
        }

        return redirect()->route('admin.honorary.index');
    }

    public function show(Honorary $honorary)
    {
        abort_if(Gate::denies('honorary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.honorary.show', compact('honorary'));
    }

    public function destroy(Honorary $honorary)
    {
        abort_if(Gate::denies('honorary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $honorary->delete();

        return back();
    }
    public function massDestroy(MassDestroyHonoraryRequest $request)
    {
        Honorary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
