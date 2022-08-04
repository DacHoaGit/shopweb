@extends('admin.home')
@section('content')
    <table class="table table-striped table-centered mb-0" id="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Order Status</th>
                    <th>Update</th>
                    <th>Actions</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>
                            @if ($customer->status==0)
                                <span class="badge badge-warning-lighten">Processing</span>
                            @elseif ($customer->status==1)
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
                        <td>&nbsp;</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    {!!$customers -> links('pagination::bootstrap-4') !!}
@endsection