
@extends('admin.home')
@section('content')
@include('admin.search-with-date')

    <table class="table table-striped table-centered mb-0" id="table-data" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Name Bank</th>
                    <th>Bank Number</th>
                    <th>Updated at</th>
                    <th>Active</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
    </table>
@endsection

@push('js')
<script>
    $(document).ready( function () {
        $('#table-data').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '{{ route('api-show-payment') }}',
            "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "name_bank" },
            { "data": "bank_number" },
            { "data": "updated_at" },],
            "columnDefs": [
            {
                "targets": 5,
                "data": "active",
                "render": function ( data, type, row, meta ) {
                    if(data==0)
                        return '<span class="badge badge-success">Active</span>';
                    return '<span class="badge badge-danger">Deactive</span>';
                }
            },
            {
                "targets": 7,
                "data": "id",
                
                "render": function ( data, type, row, meta ) {
                    return '<a href="/admin/payment/edit/'+data+'" class="action-icon"> <i class="mdi mdi-pencil"></i></a><a type="button" class="action-icon btn-delete"> <i class="mdi mdi-delete"></i></a>';
                }
            },
            {
                "targets": 6,
                "data": "thumb",
                
                "render": function ( data, type, row, meta ) {
                    return '<img src="'+data+'" height="100" alt="" >';
                }
            },
            
            ]
        });
        $('#table-data tbody').on('click', '.btn-delete', function () {
                var $table =  $('#table-data').DataTable();
                var data = $table.row($(this).parents('tr')).data();
                removeRow(data.id,'/admin/payment/destroy');
        });
      });
</script>
@endpush