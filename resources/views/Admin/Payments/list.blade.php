
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
    
        function fetch_data(start_date='',end_date=''){
            $('#table-data').DataTable({
                "processing": true,
                "serverSide": true,
                "dom": 'Blfrtip',
                "buttons": [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "ajax": {
                    url:'{{ route("api-show-payment") }}',
                    type:"POST",
                    data:{start_date,end_date},
                },
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
                {
                    "targets": 4,
                    "data" : "updated_at",
                    "render": function ( data, type, row, meta ) {
                        
                        return ((data.split('.'))[0]).replace('T',' ');
                    }
                },
                
                ]
            });
        }
        $('#table-data tbody').on('click', '.btn-delete', function () {
                var $table =  $('#table-data').DataTable();
                var data = $table.row($(this).parents('tr')).data();
                removeRow(data.id,'/admin/payment/destroy');
        });


        fetch_data();

        $('#reset-date').click(function(){
            $('#input-date-from').val('');
            $('#input-date-to').val('')
            $('#table-data').DataTable().destroy();
            fetch_data();

        })




        $("#input-date-from,#input-date-to").datepicker(
        {  
                dateFormat: 'yy/mm/dd' 

        }).on("change", function() {
            var min = $('#input-date-from').val();
            var max = $('#input-date-to').val();
            
            if(min != '' && max != ''){
                $('#table-data').DataTable().destroy();
                fetch_data(min,max);
            }
        });
    });
</script>
@endpush