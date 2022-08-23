@extends('admin.home')
@section('content')
    <table class="table table-striped dt-responsive table-centered mb-0" id="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th>Actions</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $key => $slider)
                    <tr>
                        <td>{{$slider->id}}</td>
                        <td>{{$slider->name}}</td>
                        <td>{{$slider->url}}</td>
                        <td><img src="{{$slider->thumb}}" height="100" alt="" ></td>
                        <td>{!!($slider->active==0)? '<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Deactive</span>'!!}</td>
                        <td>{{$slider->updated_at}}</td>
                        <td class="table-action normal">
                            <a href="/admin/sliders/edit/{{$slider->id}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                            <a href="#" class="action-icon btn-delete" onclick="removeRow({{$slider->id}},'/admin/sliders/destroy')"> <i class="mdi mdi-delete"></i></a>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    {!! $sliders -> links() !!}
@endsection
