
@extends('admin.home')
@section('content')

    <div class="input-group col-sm-12 col-md-3">
        <input type="text" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
    </div>
    <table class="table table-striped table-centered mb-0" id="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Name Bank</th>
                    <th>Bank Number</th>
                    <th>Active</th>
                    <th>Action</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $key => $payment)
                    <tr>
                        <td>{{$payment->id}}</td>
                        <td>{{$payment->name}}</td>
                        <td>{{$payment->name_bank}}</td>
                        <td>{{$payment->bank_number}}</td>
                        <td><img src="{{$payment->thumb}}" height="100" alt="" ></td>
                        <td>{!!($payment->active==0)? '<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Deactive</span>'!!}</td>
                        <td>{{$payment->updated_at}}</td>
                        <td class="table-action">
                            <a href="/admin/payments/edit/{{$payment->id}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                            <a href="#" class="action-icon btn-delete" onclick="removeRow({{$payment->id}},'/admin/payments/destroy')"> <i class="mdi mdi-delete"></i></a>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    {!!$payments -> links('pagination::bootstrap-4') !!}
@endsection
