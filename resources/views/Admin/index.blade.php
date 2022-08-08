
@extends('admin.home')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="form-inline">
                    <div class="form-group">
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" value="{{date("m/d/Y")}}">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ml-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-lg-4">
    <div class="card tilebox-one">
        <div class="card-body">
            <i class="mdi mdi-cart-plus widget-icon"></i>
            <h6 class="text-uppercase mt-0">Orders</h6>
            <h2 class="my-2" id="active-users-count">{{$totalMonth}}</h2>
            <p class="mb-0 text-muted">
                @if ($rateOrder>=0)
                    <span class="text-success mr-2"><span class="mdi mdi-arrow-up-bold"></span> {{$rateOrder}}%</span>
                @else
                    <span class="text-danger mr-2"><span class="mdi mdi-arrow-down-bold"></span> {{($rateOrder)*(-1)}}%</span>
                @endif
                <span class="text-nowrap">Since last month</span>  
            </p>
        </div> <!-- end card-body-->
    </div>
</div>
@endsection
@push('js')
<script>
    // $(document).off('.datepicker.data-api');

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

