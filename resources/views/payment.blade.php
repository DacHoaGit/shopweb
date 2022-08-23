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

    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Categories
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Women
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Men
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shoes
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Watches
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Help
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Track Order
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Returns
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shipping
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        GET IN TOUCH
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us
                        on (+1) 96 716 6879
                    </p>

                    <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Newsletter
                    </h4>

                    <form>
                        <div class="wrap-input1 w-full p-b-4">
                            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                                placeholder="email@example.com">
                            <div class="focus-input1 trans-04"></div>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-t-40">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
                    </a>
                </div>

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>.
                    Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    @include('footer')
</body>
</html>
