<?php

namespace App\Http\Controllers\Admin;

use App\FileTemplate;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFileTemplateRequest;
use App\Http\Requests\StoreFileTemplateRequest;
use App\Http\Requests\UpdateFileTemplateRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FileTemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('filetemplate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $file_template = FileTemplate::all();

        return view('admin.filetemplate.index', compact('file_template'));
    }

    public function create()
    {
        abort_if(Gate::denies('filetemplate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.filetemplate.create');
    }

    public function store(StorefiletemplateRequest $request)
    {
        $file_template = FileTemplate::create($request->all());

        return redirect()->route('admin.filetemplate.index');
    }

    public function edit(FileTemplate $file_template)
    {
        abort_if(Gate::denies('filetemplate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.filetemplate.edit', compact('file_template'));
    }

    public function update(UpdateFileTemplateRequest $request, FileTemplate $file_template)
    {
        $file_template->update($request->all());

        return redirect()->route('admin.filetemplate.index');
    }

    public function show(FileTemplate $file_template)
    {
        abort_if(Gate::denies('filetemplate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.filetemplate.show', compact('filetemplate'));
    }

    public function destroy(FileTemplate $file_template)
    {
        abort_if(Gate::denies('filetemplate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $file_template->delete();

        return back();
    }

    public function massDestroy(MassDestroyFileTemplateRequest $request)
    {
        FileTemplate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
