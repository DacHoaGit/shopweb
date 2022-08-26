@extends('admin.home')
@section('content')
@include('admin.search-with-date')
<div class="tab-content">
    <table class="table table-striped table-centered mb-0"  id="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Update</th>
                    <th>Order Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>
                            @if ($customer->status==0)
                                <span class="text-muted">{{App\Enums\CustomerStatus::getKey($customer->status)}}</span>
                            @elseif ($customer->status==1)
                                <span class="badge badge-warning-lighten">{{App\Enums\CustomerStatus::getKey($customer->status)}}</span>
                            @elseif ($customer->status==2)
                                <span class="badge badge-info-lighten">Shipped</span>
                            @else
                                <span class="badge badge-danger-lighten">Cancelled</span>
                            @endif
                        </td>
                        <td>{{$customer->updated_at}}</td>
                        <td class="table-action">
                            <a href="/admin/customer/detail/{{$customer->id}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                            <a href="#" class="action-icon btn-delete" onclick="removeRow({{$customer->id}},'/admin/customer/destroy')"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
    </table>
    {{-- {!!$customers -> links('pagination::bootstrap-4') !!} --}}
</div>
@endsection

@push('js')
<script>
    $(document).ready( function () {
        function fetch_data(start_date='',end_date=''){
            $('#table-data').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url:'{{ route("api-show-customer") }}',
                    type:"POST",
                    data:{start_date,end_date},
                },
                "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "address"},
                { "data": "phone"},
                { "data": "updated_at"},],

                "columnDefs": [
                {
                    "targets": 5,
                    "data": "status",
                    "render": function ( data, type, row, meta ) {
                        switch (data){
                            case 0:
                                return '<span class="text-muted">UNPAID</span>';
                            case 1:
                                return '<span class="badge badge-warning-lighten">PROCESSING</span>';
                            case 2:
                                return '<span class="badge badge-info-lighten">DELIVERED</span>';
                            default:
                                return '<span class="badge badge-danger-lighten">CANCELLED</span>';
                        }
                    }
                },
                {
                    "targets": 6,
                    "data": "id",
                    
                    "render": function ( data, type, row, meta ) {
                        return '<a href="/admin/customer/detail/'+data+'" class="action-icon"> <i class="mdi mdi-eye"></i></a><a href="#" class="action-icon btn-delete"> <i class="mdi mdi-delete"></i></a>';
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
                removeRow(data.id,'/admin/customer/destroy');
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