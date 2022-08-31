<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>

    <!-- Header -->
    @include('header')

    <!-- Cart -->
    @include('cart')

    <div class="container m-t-100">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html"
                class="stext-109 cl8 hov-cl1 trans-04">
                {{ $product->menu->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{ $title }}
            </span>
        </div>
    </div>

    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <!-- Product image -->
                                    <a href="javascript: void(0);" class="text-center d-block mb-4">
                                        <img src="{{$product->thumb}}" class="img-fluid" style="max-width: 280px;" alt="Product-img">
                                    </a>
                                </div> <!-- end col -->
                                <div class="col-lg-7">
                                    <div class="pl-lg-4">
                                        <!-- Product title -->
                                        <h3 class="mt-0">{{$product->name}}<a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ml-2"></i></a> </h3>

                                        <p class="stext-102 cl3 p-t-23">
                                            {{ $product->description }}
                                        </p>
                
                                        <!-- Product stock -->
                                        <div class="mt-3">
                                            <h4><span class="badge badge-success-lighten">Instock</span></h4>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-2">
                                            <h3>
                                            @if ($product->price_sale)
                                                <span class="fs-15 lh-12 m-r-6" style="color: red;">
                                                    <i class="zmdi zmdi-fire"></i>
                                                </span>
                                                Flash Sale: {!! number_format($product->price_sale) !!} VND
                                            @else
                                                Price: {!! number_format($product->price) !!} VND
                                            @endif
                                        </h3>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="mt-3">
                                            <form action="/carts" method="POST">
                                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>
        
                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                        name="num-product" value="1">
        
                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                                <button type="submit"
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                    Add to cart
                                                </button>
                                                @csrf
                                            </form>
                                        </div>
                            
                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Description:</h6>
                                            <p>{{ $product->content }}</p>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row-->                            
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
        </div>
    </section>

    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div id="loadProduct">
                @include('list')
            </div>
        </div>
    </section>
    @include('footer')
</body>

</html>
