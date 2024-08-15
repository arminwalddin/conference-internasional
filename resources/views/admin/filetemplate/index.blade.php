@extends('layouts.admin')
@section('content')
@can('filetemplate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.filetemplate.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.filetemplate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.filetemplate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Faq">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.filetemplate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.filetemplate.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.filetemplate.fields.path') }}
                        </th>
                        <th>
                            {{ trans('cruds.filetemplate.fields.category') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($file_template as $key => $file_template)
                        <tr data-entry-id="{{ $file_template->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $file_template->id ?? '' }}
                            </td>
                            <td>
                                {{ $file_template->name ?? '' }}
                            </td>
                            <td>
                                {{ $filetemplate->path ?? '' }}
                            </td>
                            <td>
                                {{ $file_template->category ?? '' }}
                            </td>
                            <td>
                                @can('filetemplate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.filetemplate.show', $file_template->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('filetemplate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.filetemplate.edit', $file_template->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('filetemplate_delete')
                                    <form action="{{ route('admin.filetemplate.destroy', $file_template->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('faq_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.faqs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Faq:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection