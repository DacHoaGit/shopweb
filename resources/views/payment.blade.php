<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>

    <!-- Header -->
    @include('header')

    <!-- Cart -->
    {{-- @include('cart') --}}

    <div class="container m-t-100">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Payment
            </span>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('error'))     
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="text-center">
        <h2> Payment </h2>
    </div>

    <section class="bg0 p-t-100 p-b-140">
        <div class="container">
        <div class="tab-pane active" id="payment-information">
            <div class="row">


                <div class="col-lg-4">
                    <div class="border p-3 mt-4 mt-lg-0 rounded">
                        <h4 class="header-title mb-3">Order Summary</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0">
                                <tbody>
                                    @php $total = 0 @endphp
                                    @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            <img src="{{asset($cart->product->thumb)}}" alt="contact-img" title="contact-img" class="rounded mr-2" height="48">
                                            <p class="m-0 d-inline-block align-middle">
                                                <a href="" class="text-body font-weight-semibold">{{$cart->product->name}}</a>
                                                <br>
                                                <small>{{$cart->quantity}} x {{$cart->price}}</small>
                                            </p>
                                        </td>
                                        <td class="text-right">
                                            {{($cart->quantity)*($cart->price)}}
                                        </td>
                                    </tr>
                                    @php $total += ($cart->quantity)*($cart->price) @endphp
                                    @endforeach
                                    
                                    <tr class="text-right">
                                        <td>
                                            <h5 class="m-0">Total:</h5>
                                        </td>
                                        <td class="text-right font-weight-semibold">
                                            {{number_format($total)}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div> <!-- end .border-->

                </div> <!-- end col -->        
                <div class="col-lg-8">
                    <h4 class="mt-2">Payment Selection</h4>

                    <p class="text-muted mb-4">Fill the form below in order to
                        send you the order's invoice.</p>

                    @foreach ($payments as $payment)
                    <div class="border p-3 mb-3 rounded">
                        <div class="row">
                            <div class="col-sm-8">
                                <img src="{{asset($payment->thumb)}}" height="25" alt="paypal-img">

                                <div class="custom-control custom-radio">
                                    <label class="custom-control-label font-16 font-weight-bold" for="BillingOptRadio2">Pay with {{$payment->name_bank}}</label>
                                </div>
                                <div class="form-group">
                                    <label for="card-number">Card Number</label>
                                    <input type="text" id="card-number" class="form-control" data-toggle="input-mask"  value="{{$payment->bank_number}}" readonly maxlength="19">
                                </div>
                                <div class="form-group">
                                    <label for="card-number">Full Name</label>
                                    <input type="text" id="card-number" class="form-control" data-toggle="input-mask"  value="{{$payment->name}}" readonly maxlength="19">
                                </div>
                                <div class="form-group">
                                    <label for="card-number">Memo</label>
                                    <input type="text" id="card-number" class="form-control" data-toggle="input-mask"  value="Shopbee {{$customer->id}}" readonly maxlength="19">
                                </div>
                                <p class="text-danger mb-0 pl-3 pt-1">Fill in the money transfer information correctly to make the payment</p>
                            </div>
                           
                        </div>
                    </div>
                    @endforeach
                    
                    
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <a href="/my-order" class="btn text-muted d-none d-sm-inline-block btn-link font-weight-semibold">
                                <i class="mdi mdi-arrow-left"></i> Back to Shopping Cart </a>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-sm-right">
                            @if ($customer->status == 0)
                                <form action="/payment/update" method="post">
                                    @csrf
                                    {{-- <input type="hidden" name="user_id" value="{{auth()->user()->id}}"> --}}
                                    <input type="hidden" name="customer" value="{{$customer->id}}">
                                    <button type="submit" class="btn btn-info">Complete Order </button>
                                </form>
                            @elseif($customer->status == 1)
                                <button type="button" class="btn btn-lg btn-warning" disabled>Waiting for handling.</button>
                            @elseif($customer->status == 2)
                                <button type="button" class="btn btn-lg btn-primary" disabled>Cancelled</button>   
                            @endif
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row-->

                </div> <!-- end col -->

                    
            </div> <!-- end row-->
        </div>
    </div>
    </section>


    @include('footer')
</body>
</html>
