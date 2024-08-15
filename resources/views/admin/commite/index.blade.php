@extends('layouts.admin')
@section('content')
@can('commite_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.commite.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.commite.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.commite.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Speaker">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.commite.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.commite.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.commite.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.commite.fields.twitter') }}
                        </th>
                        <th>
                            {{ trans('cruds.commite.fields.facebook') }}
                        </th>
                        <th>
                            {{ trans('cruds.commite.fields.linkedin') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commite as $key => $commite)
                        <tr data-entry-id="{{ $commite->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $commite->id ?? '' }}
                            </td>
                            <td>
                                {{ $commite->name ?? '' }}
                            </td>
                            <td>
                                {{ $commite->description ?? '' }}
                            </td>
                            <td>
                                {{ $commite->twitter ?? '' }}
                            </td>
                            <td>
                                {{ $commite->facebook ?? '' }}
                            </td>
                            <td>
                                {{ $commite->linkedin ?? '' }}
                            </td>
                            <td>
                                @can('commite_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.commite.show', $commite->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('commite_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.commite.edit', $commite->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('commite_delete')
                                    <form action="{{ route('admin.commite.destroy', $commite->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('commite_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.commite.massDestroy') }}",
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
  $('.datatable-Speaker:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection