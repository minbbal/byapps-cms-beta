@extends('layouts.default')

@section('content')

<div class="container col-12 col-md-12">

  <div class="method">
    <div class="col-md-12 mt-3">

      {{ Breadcrumbs::render('resellerinfolist') }}

     <table id="resellerinfolistTable" class="table table-striped mb-3 table-colored table-inverse" style="width:100%;">
         <thead>
             <tr>
                 <th>idx</th>
                 <th>아이디</th>
                 <th>상태</th>
                 <th>업체명</th>
                 <th>담당자</th>
                 <th>연락처</th>
                 <th>가입회원수</th>
                 <th>등록IP</th>
                 <th>등록일</th>
             </tr>
         </thead>
       </table>
      </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
$(function() {
    $('#resellerinfolistTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('resellerinfolist') }}",
          crossDomain: true
        },
        columns: [
            { data: 'idx', name: 'idx' },
            { data: 'mem_id', name: 'mem_id' },
            { data: 'mem_lv', name: 'mem_lv' },
            { data: 'company', name: 'company' },
            { data: 'company_owner', name: 'company_owner' },
            { data: 'cellno', name: 'cellno' },
            { data: 'mem_count', name: 'mem_count' },
            { data: 'ip', name: 'ip' },
            { data: 'reg_date', name: 'reg_date' },
        ],
        columnDefs: [
           {
              'targets': 0,
              'className': 'select-checkbox',
              'searchable': false,
              'orderable': false,
              'checkboxes': {
                 'selectRow': true
              },
           },
        ],
        select: {
           'style': 'multi'
        },
        order: [[ 8, 'desc']],
        "paging": true,
        "pageLength": 50,
        "fixedHeader": false,
        "responsive": true,
        "orderClasses": false,
        "stateSave": false,

        "fnDrawCallback": function () {
            $("#resellerinfolistTable tbody tr").click(function () {
              table = $('#resellerinfolistTable').dataTable();
              window.location.href = "/resellerinfodetail/" + this.id;
            });
         }
    });
});
</script>
@endpush
