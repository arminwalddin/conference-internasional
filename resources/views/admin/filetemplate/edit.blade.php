@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.filetemplate.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.filetemplate.update", [$file_template->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.filetemplate.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($file_template) ? $file_template->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.filetemplate.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('path') ? 'has-error' : '' }}">
                <label for="path">{{ trans('cruds.filetemplate.fields.path') }}*</label>
                <input type="text" id="path" name="path" class="form-control" value="{{ old('path', isset($file_template) ? $file_template->path : '') }}" required>
                @if($errors->has('path'))
                    <p class="help-block">
                        {{ $errors->first('path') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.filetemplate.fields.path_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <label for="category">{{ trans('cruds.filetemplate.fields.category') }}*</label>
                <input type="text" id="category" name="category" class="form-control" value="{{ old('category', isset($file_template) ? $file_template->category : '') }}" required>
                @if($errors->has('category'))
                    <p class="help-block">
                        {{ $errors->first('category') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.filetemplate.fields.category_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection