@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.filetemplate.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.filetemplate.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.filetemplate.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($filetemplate) ? $filetemplate->name : '') }}" required>
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
                <input type="text" id="path" name="path" class="form-control" value="{{ old('path', isset($filetemplate) ? $filetemplate->path : '') }}" required>
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
                <input type="text" id="category" name="category" class="form-control" value="{{ old('category', isset($filetemplate) ? $filetemplate->path : '') }}" required>
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