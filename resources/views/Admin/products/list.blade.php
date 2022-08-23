
@extends('admin.home')
@section('content')
    <table class="table table-striped table-centered mb-0" id="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Catalog</th>
                    <th>Price</th>
                    <th>Price sale</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th>Actions</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->menu->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->price_sale}}</td>
                        <td>{!!($product->active==0)? '<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Deactive</span>'!!}</td>
                        <td>{{$product->updated_at}}</td>
                        <td class="table-action">
                            
                            <a href="/admin/products/edit/{{$product->id}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                            <a href="#" class="action-icon btn-delete" onclick="removeRow({{$product->id}},'/admin/products/destroy')"> <i class="mdi mdi-delete"></i></a>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    {!!$products -> links('pagination::bootstrap-4') !!}
@endsection

