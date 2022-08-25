@extends('admin.home')
@section('content')
@include('admin.search-with-date')
    <table class="table table-striped dt-responsive table-centered mb-0" id="table-data" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Update</th>
                    <th>Active</th>
                    <th>Image</th>
                    <th>Actions</th>
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
            "ajax": '{{ route('api-show-slider') }}',
            "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "url" },
            { "data": "updated_at" },],
            "columnDefs": [
            {
                "targets": 4,
                "data": "active",
                "render": function ( data, type, row, meta ) {
                    if(data==0)
                        return '<span class="badge badge-success">Active</span>';
                    return '<span class="badge badge-danger">Deactive</span>';
                }
            },
            {
                "targets": 6,
                "data": "id",
                
                "render": function ( data, type, row, meta ) {
                    return '<a href="/admin/slider/edit/'+data+'" class="action-icon"> <i class="mdi mdi-pencil"></i></a><a type="button" class="action-icon btn-delete"> <i class="mdi mdi-delete"></i></a>';
                }
            },
            {
                "targets": 5,
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
                removeRow(data.id,'/admin/slider/destroy');
        });
      });
</script>
@endpush
