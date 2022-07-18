
@extends('admin.home')
@section('content')
    <table class="table table-striped table-centered mb-0" id="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Update date</th>
                    <th>Action</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                {!!app\Helpers\Helper::menu($menus)!!}
            </tbody>
    </table>
    {{-- <nav class="float-right">
        <ul class="pagination pagination-rounded mb-0">
            <li class="page-item">
                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
            <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
            <li class="page-item">
                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav> --}}
@endsection

@push('js')
<script>

    // $(document).ready(function () {

    //     // crawl data
    //     $.ajax({
    //         url: '/admin/menus/listApi',
    //         dataType: 'json',
    //         data: {page: {{ request()->get('page') ?? 1 }} },
    //         success: function (response) {
    //             console.log(response.data);
    //             response.data.forEach(function (each) {
    //                 let id = each.id;
    //                 let name = each.name;
    //                 let active = each.active;
    //                 let updated_at = each.updated_at;
    //                 $('#table-data').append($('<tr>')
    //                     .append($('<td>').append(id))
    //                     .append($('<td>').append(name))
    //                     .append($('<td>').append((active==0)? 'Yes':'No'))
    //                     .append($('<td>').append(updated_at))   
    //                     .append($('<td class=""table-action"">').append(`<a href="/admin/menus/edit/`+id+`"'.'class="action-icon"> <i class="mdi mdi-pencil"></i></a>
    //                     <a href="#" class="action-icon btn-delete" onclick="removeRow(`+id+`,\'/admin/menus/destroy\')"> <i class="mdi mdi-delete"></i></a>`)) 
    //                     .append($('<td>').append('&nbsp;'))   
                                                 
    //                 );
    //             });


    //             renderPagination(response.data.pagination);
    //         },
    //         error: function (response) {

    //         }
    //     })
    // });
</script>
@endpush
