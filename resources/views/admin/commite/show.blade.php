@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.commite.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.commite.fields.id') }}
                        </th>
                        <td>
                            {{ $commite->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commite.fields.name') }}
                        </th>
                        <td>
                            {{ $commite->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commite.fields.description') }}
                        </th>
                        <td>
                            {!! $commite->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commite.fields.full_description') }}
                        </th>
                        <td>
                            {!! $commite->full_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commite.fields.photo') }}
                        </th>
                        <td>
                            @if($commite->photo)
                                <a href="{{ $commite->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $commite->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commite.fields.twitter') }}
                        </th>
                        <td>
                            {{ $commite->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commite.fields.facebook') }}
                        </th>
                        <td>
                            {{ $commite->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commite.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $commite->linkedin }}
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