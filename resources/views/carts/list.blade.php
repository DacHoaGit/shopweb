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
                Shoping Cart
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


    @if (isset($carts))
        @php
            $total = 0;
        @endphp
        <form class="bg0 p-t-75 p-b-85" method="POST" action="/payment">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">

                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tbody>
                                        <tr class="table_head">
                                            <th class="column-1">Product</th>
                                            <th class="column-2"></th>
                                            <th class="column-3">Price</th>
                                            <th class="column-4">Quantity</th>
                                            <th class="column-5">Total</th>
                                            <th class="column-6">&nbsp</th>
                                        </tr>
                                        @foreach ($products as $product)
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ $product->thumb }}" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-2">{{ $product->name }}</td>
                                                <td class="column-3">{!! number_format($product->price_sale) !!} VND</td>
                                                <td class="column-4">
                                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                                            id="btn-down">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product"
                                                            type="button" name="{{ $product->id }}"
                                                            value="{{ $carts[$product->id] }}">
                                                        
                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                                            id="btn-up">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="column-5">{!! number_format($carts[$product->id] * $product->price_sale) !!} VND</td>
                                                @php
                                                    $total += $carts[$product->id] * $product->price_sale;
                                                @endphp
                                                <td class="p-r-20">
                                                    <a class="pointer bg15 bor13 p-lr-15"
                                                        onclick="removeRow({{ $product->id }},'/carts/delete')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <input formaction="/update-carts"
                                    class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                    type="submit" value="Update Cart">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>

                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Subtotal:
                                    </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2" name="price" value=>
                                        {!! number_format($total) !!} VND
                                    </span>
                                </div>
                            </div>

                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                                    <p class="stext-111 cl6 p-t-2">
                                        Please provide complete delivery information
                                    </p>
                                    <div class="p-t-15 ">
                                        <span class="stext-112 cl8">
                                            Customer information
                                        </span>

                                        <div class="bor8 bg0 m-b-12" id="country">
                                            <select class="stext-111 cl8 plh3 size-111 p-lr-15 select-city" name="city" id = "select-city">
                                            </select>
                                        </div>

                                        <div class="bor8 bg0 m-b-12" >
                                            <select class=" stext-111 cl8 plh3 size-111 p-lr-15 select-district" name="district" id = "select-district">
                                            </select>
                                        </div>

                                        <div class="bor8 bg0 m-b-12" >
                                            <select class="stext-111 cl8 plh3 size-111 p-lr-15 select-ward" id = "select-ward" name="ward">
                                            </select>
                                        </div>  

                                        <div class="border border-secondary bg0 m-b-22">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                name="name" placeholder="Name" required>
                                        </div>

                                        <div class="border border-secondary bg0 m-b-22">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="tel"
                                                name="phone" placeholder="Phone" required>
                                        </div>

                                        <div class="border border-secondary bg0 m-b-22">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                name="note" placeholder="Note">
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {!! number_format($total) !!} VND
                                    </span>
                                </div>
                            </div>

                            <button
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                                Proceed to Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    @else
        <div class="text-center">
            <h2>{{ $title }}</h2>
        </div>
    @endif

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

<script>
    $(document).ready( function(){


        async function loadDistrict(){
            const selectedVal = $("#select-district").val();
            $('#select-district').empty();
            const district = $("#select-city").find(':selected').data('path');
            const dis = await fetch('{{ asset('locations/') }}' + district);
            const districts = await dis.json();
            $.each(districts.district,async function (index, each) {
                var eachVal = each.pre +' '+ each.name;
                var dis = each.ward;
                if(eachVal.trim() == String(selectedVal).trim()){
                    $("#select-district").append(`
                    <option selected data-path='${each.name}'>
                        ${each.pre +' '+ each.name}
                    </option>`)
                }
                else{
                    $("#select-district").append(`
                    <option data-path='${each.name}'>${each.pre +' '+ each.name}</option>`)
                }
            })
            const ward =$("#select-district").find(':selected').data('path');
            $('#select-ward').empty();
            $.each(districts.district,async function (index, each) {
                if(each.name == ward){
                    $.each(each.ward, function (index, each){
                        $("#select-ward").append(`
                        <option >${each.pre +' '+ each.name}</option>`)
                    })
                }
            })
        }
        async function loadFile() {
            const response = await fetch("{{asset('locations/index.json')}}");
            const cities = await response.json();
            $.each(cities, function (index, each) {
                $("#select-city").append(`
                <option data-path='${each.file_path}'>
                    ${index}
                </option>`)
            })
            loadDistrict();  
        }
        loadFile();
        $('#select-city, #select-district').change(function(){
            loadDistrict();  
        })



        $('#btn-up, #btn-down').click(function(){
            const id = $(".num-product").attr("name");
            const num = $('.num-product').val();   
            $.ajax({
                type:'post',
                datatype:'json',
                data:{id,num},
                url:'/update-carts',
                success:function(result){
                    
                }
            })
        })
    })
    
</script>