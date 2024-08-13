@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ispeaker.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.ispeaker.update", [$ispeaker->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.ispeaker.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($ispeaker) ? $ispeaker->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ispeaker.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.ispeaker.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($ispeaker) ? $ispeaker->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ispeaker.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('full_description') ? 'has-error' : '' }}">
                <label for="full_description">{{ trans('cruds.ispeaker.fields.full_description') }}</label>
                <textarea id="full_description" name="full_description" class="form-control ">{{ old('full_description', isset($ispeaker) ? $ispeaker->full_description : '') }}</textarea>
                @if($errors->has('full_description'))
                    <p class="help-block">
                        {{ $errors->first('full_description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ispeaker.fields.full_description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.ispeaker.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <p class="help-block">
                        {{ $errors->first('photo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ispeaker.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                <label for="twitter">{{ trans('cruds.ispeaker.fields.twitter') }}</label>
                <input type="text" id="twitter" name="twitter" class="form-control" value="{{ old('twitter', isset($ispeaker) ? $ispeaker->twitter : '') }}">
                @if($errors->has('twitter'))
                    <p class="help-block">
                        {{ $errors->first('twitter') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ispeaker.fields.twitter_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                <label for="facebook">{{ trans('cruds.ispeaker.fields.facebook') }}</label>
                <input type="text" id="facebook" name="facebook" class="form-control" value="{{ old('facebook', isset($ispeaker) ? $ispeaker->facebook : '') }}">
                @if($errors->has('facebook'))
                    <p class="help-block">
                        {{ $errors->first('facebook') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ispeaker.fields.facebook_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('linkedin') ? 'has-error' : '' }}">
                <label for="linkedin">{{ trans('cruds.ispeaker.fields.linkedin') }}</label>
                <input type="text" id="linkedin" name="linkedin" class="form-control" value="{{ old('linkedin', isset($ispeaker) ? $ispeaker->linkedin : '') }}">
                @if($errors->has('linkedin'))
                    <p class="help-block">
                        {{ $errors->first('linkedin') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ispeaker.fields.linkedin_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.ispeaker.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($ispeaker) && $ispeaker->photo)
      var file = {!! json_encode($ispeaker->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop