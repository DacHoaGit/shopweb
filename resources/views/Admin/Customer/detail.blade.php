
@extends('admin.home')
@section('content')

    <div class="card-body">
        <h4 class="header-title mb-3">{{$title}}</h4>

        <ul class="list-unstyled mb-0">
            <li>
                <p class="mb-2"><span class="font-weight-bold mr-2">Name:</span> {{$customer->name}}</p>
                <p class="mb-2"><span class="font-weight-bold mr-2">Address:</span> {{$customer->address}}</p>
                <p class="mb-2 text-break"><span class="font-weight-bold mr-2 ">Note:</span> {{$customer->note}}</p>
                <p class="mb-2"><span class="font-weight-bold mr-2">Order Date:</span> {{$customer->updated_at}}</p>
            </li>
        </ul>

    </div>

    <input type="hidden" id="status" value="{{$customer->status}}">
    <input type="hidden" id="customer" value="{{$customer->id}}">

    <div class="text-lg-right">
        <button type="button" class="btn-status btn btn-light mb-2" id="btn-0" value="0" >UNPAID</button>
        <button type="button" class="btn-status btn btn-light mb-2" id="btn-1" value="1">PROCESSING</button>
        <button type="button" class="btn-status btn btn-light mb-2" id="btn-2" value="2">DELIVERED</button>
        <button type="button" class="btn-status btn btn-light mb-2" id="btn-2" value="3">CANCELLED</button>
    </div>

    <table class="table table-striped table-centered mb-0" id="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Note</th>
                    <th>Image</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @foreach ($carts as $key => $cart)
                    <tr>
                        <td>{{$cart->product->id}}</td>
                        <td>{{$cart->product->name}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>{{$cart->price}}</td>
                        <td>{{($cart->price)*($cart->quantity)}}</td>
                        <td>{{$cart->note}}</td>
                        <td><img src="{{asset($cart->product->thumb)}}" style="width:100px;" alt=""></td>
                        <td>&nbsp;</td>
                    </tr>
                    @php $total += ($cart->quantity)*($cart->price) @endphp
                @endforeach
            </tbody>
    </table>
    <div class="mt-3 mb-3">
        <h1 style="text-align: right;" class="mr-3 font-16 text-success">Total: {{number_format($total)}}</h1>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            const status = $('#status').val();
            const customer = $('#customer').val();
            $('#btn-'+String(status)).toggleClass('btn-light btn-success');
            $('.btn-status').click(function(){
                const statusId = $(this).val();
                // alert(id);
            $.ajax({
                type:'post',
                datatype:'json',
                data:{statusId,customer},
                url:'/admin/customer/update/',
                success:function(result){
                    location.reload();
                }
            })
                // $(this).toggleClass('btn-light btn-success');
                // $('#btn-processing').attr('class', 'btn-success');
            })
        })
    </script>
@endpush


