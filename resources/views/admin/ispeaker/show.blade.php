@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ispeaker.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ispeaker.fields.id') }}
                        </th>
                        <td>
                            {{ $ispeaker->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ispeaker.fields.name') }}
                        </th>
                        <td>
                            {{ $ispeaker->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ispeaker.fields.description') }}
                        </th>
                        <td>
                            {!! $ispeaker->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ispeaker.fields.full_description') }}
                        </th>
                        <td>
                            {!! $ispeaker->full_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ispeaker.fields.photo') }}
                        </th>
                        <td>
                            @if($ispeaker->photo)
                                <a href="{{ $ispeaker->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $ispeaker->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ispeaker.fields.twitter') }}
                        </th>
                        <td>
                            {{ $ispeaker->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ispeaker.fields.facebook') }}
                        </th>
                        <td>
                            {{ $ispeaker->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ispeaker.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $ispeaker->linkedin }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection