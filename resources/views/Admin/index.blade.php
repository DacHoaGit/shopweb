
@extends('admin.home')
@section('content')

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
