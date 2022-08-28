<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Billing Information</h4>

            <ul class="list-unstyled mb-0">
                <li>
                    <p class="mb-2"><span class="font-weight-bold mr-2">Name:</span> {{$customer->name}}</p>
                    <p class="mb-2"><span class="font-weight-bold mr-2">Address:</span> {{$customer->address}}</p>
                    <p class="mb-2 text-break"><span class="font-weight-bold mr-2 ">Note:</span> {{$customer->note}}</p>
                    <p class="mb-2"><span class="font-weight-bold mr-2">Order Date:</span> {{$customer->updated_at}}</p>
                    <p class="mb-2"><span class="font-weight-bold mr-2">Status:</span> {{$customer->status}}</p>
                </li>
            </ul>
        </div>
    </div>
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
                <td>&nbsp;</td>
            </tr>
            @php $total += ($cart->quantity)*($cart->price) @endphp
        @endforeach
    </tbody>
</table>

<div class="text-lg-right mt-2">
    <span  class="font-16  btn disabled btn-success mb-2" id="btn-2" disabled value="3">Total: {{number_format($total)}}</span>
</div>


