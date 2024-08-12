<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSpeakerRequest;
use App\Http\Requests\UpdateSpeakerRequest;
use App\Http\Resources\Admin\SpeakerResource;
// use App\Honorary;
use App\Http\Requests\MassDestroySpeakerRequest;
use App\Speaker;
// use App\Http\Requests\StoreHonoraryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpeakerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('speaker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $speaker = Speaker::all();

        return view('admin.speaker.index', compact('speaker'));
    }

    public function create()
    {
        abort_if(Gate::denies('speaker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.speaker.create');
    }

    public function store(StoreSpeakerRequest $request)
    {
        $speaker = Speaker::create($request->all());

        if ($request->input('photo', false)) {
            $speaker->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.speaker.index');
    }

    public function edit(Speaker $speaker)
    {
        abort_if(Gate::denies('speaker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.speakers.edit', compact('speaker'));
    }

    public function update(UpdateSpeakerRequest $request, Speaker $speaker)
    {
        $speaker->update($request->all());

        if ($request->input('photo', false)) {
            if (!$speaker->photo || $request->input('photo') !== $speaker->photo->file_name) {
                $speaker->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($speaker->photo) {
            $speaker->photo->delete();
        }

        return redirect()->route('admin.speaker.index');
    }

    public function show(Speaker $speaker)
    {
        abort_if(Gate::denies('speaker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.speakers.show', compact('speaker'));
    }

    public function destroy(Speaker $speaker)
    {
        abort_if(Gate::denies('speaker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $speaker->delete();

        return back();
    }
    public function massDestroy(MassDestroySpeakerRequest $request)
    {
        Speaker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
