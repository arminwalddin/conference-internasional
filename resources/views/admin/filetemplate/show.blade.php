@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.filetemplate.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.filetemplate.fields.id') }}
                        </th>
                        <td>
                            {{ $file_template->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filetemplate.fields.name') }}
                        </th>
                        <td>
                            {{ $file_template->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filetemplate.fields.path') }}
                        </th>
                        <td>
                            {{ $file_template->path }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filetemplate.fields.category') }}
                        </th>
                        <td>
                            {{ $file_template->category }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection