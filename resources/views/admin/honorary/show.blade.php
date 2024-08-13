@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.honorary.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.honorary.fields.id') }}
                        </th>
                        <td>
                            {{ $honorary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.honorary.fields.name') }}
                        </th>
                        <td>
                            {{ $honorary->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.honorary.fields.description') }}
                        </th>
                        <td>
                            {!! $honorary->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.honorary.fields.full_description') }}
                        </th>
                        <td>
                            {!! $honorary->full_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.honorary.fields.photo') }}
                        </th>
                        <td>
                            @if($honorary->photo)
                                <a href="{{ $honorary->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $honorary->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.honorary.fields.twitter') }}
                        </th>
                        <td>
                            {{ $honorary->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.honorary.fields.facebook') }}
                        </th>
                        <td>
                            {{ $honorary->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.honorary.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $honorary->linkedin }}
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