
@extends('admin.home')
@section('content')
@include('admin.search-with-date')

    <table class="table table-striped table-centered mb-0" id="table-data" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Catalog</th>
                    <th>Price</th>
                    <th>Price sale</th>
                    <th>Update</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
    </table>
    {{-- {!!$products -> links('pagination::bootstrap-4') !!} --}}
@endsection

@push('js')
<script>
    $(document).ready( function () {
        $('#table-data').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '{{ route('api-show-product') }}',
            "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "menu" },
            { "data": "price" },
            { "data": "price_sale" },
            { "data": "updated_at" },],
            "columnDefs": [{
                "targets": 6,
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
                    return '<a href="/admin/products/edit/'+data+'" class="action-icon"> <i class="mdi mdi-pencil"></i></a><a type="button" class="action-icon btn-delete"> <i class="mdi mdi-delete"></i></a>'
                }
            },
            
            ]
        });
        $('#table-data tbody').on('click', '.btn-delete', function () {
                var $table =  $('#table-data').DataTable();
                var data = $table.row($(this).parents('tr')).data();
                removeRow(data.id,'/admin/products/destroy');
            });
        });
</script>    
@endpush