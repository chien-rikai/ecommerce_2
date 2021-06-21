
<table class="table-view table table-bordered">
  @include('common.success')
  @include('common.fail')
  <thead>
    <tr>
      <th>{{__('lang.name-cate')}}</th>
      <th>{{__('lang.multi-level')}}</th>
      <th>{{__('lang.feature')}}</th>
    </tr>
  </thead>
  <tbody>
    @include('admin.table.categories_table')
  </tbody>
</table>