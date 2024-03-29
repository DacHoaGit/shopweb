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
                    <div class="col-lg-10 col-xl-8 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tbody>
                                        <tr class="table_head">
                                            <th class="column-1">Product</th>
                                            <th class="column-1">Name</th>
                                            <th class="column-1">Price</th>
                                            <th class="column-1">Quantity</th>
                                            <th class="column-1">Total</th>
                                            <th class="column-1">Note</th>
                                            <th class="column-1"></th>
                                        </tr>
                                        @foreach ($products as $product)
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ $product->thumb }}" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-2">{{ $product->name }}</td>
                                                <td class="column-2 price">{!! $product->price_sale==0 ? number_format($product->price) : number_format($product->price_sale) !!} VND</td>
                                                <td class="column-2">
                                                    <div class="wrap-num-product flex-w m-l-5 m-r-0">
                                                        <div class="btn-num-product-down btn-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product"
                                                            type="button" name="{{ $product->id }}"
                                                            value="{{ $carts[$product->id] }}">
                                                        
                                                        <div class="btn-num-product-up btn-up cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class=" column-2 total">{!! $product->price_sale==0 ? number_format($carts[$product->id] * $product->price) : number_format($carts[$product->id] * $product->price_sale) !!} VND</td>
                                                @php
                                                    $product->price_sale==0 ? ($total += $carts[$product->id] * $product->price) : ($total += $carts[$product->id] * $product->price_sale);
                                                @endphp
                                                </td>
                                                <td class="column-2">
                                                    <div class="border border-secondary bg0 ">
                                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                            name="note_product[{{$product->id}}]" placeholder="Note">
                                                    </div>
                                                </td>
                                                <td class="column-1 p-r-20">
                                                    <a class="pointer bg15 bor13 p-lr-15"
                                                        onclick="removeRow({{ $product->id }},'/carts/delete')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
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
                                    <span class="mtext-110 cl2 total-price" name="price" value=>
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
                                    <span class="mtext-110 cl2 total-price">
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

        Number.prototype.format = function(n, x) {
            var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
            return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
        };

     

        $('.btn-up, .btn-down').click(function(){
            const parent = $(this).parent();
            const price =  $(this).closest('.table_row').find('.price').html();
            const id = parent.children(".num-product").attr("name");
            const num = parent.children('.num-product').val();   
            $.ajax({
                type:'post',
                datatype:'json',
                data:{id,num},
                url:'/update-carts',
                success:function(result){
                    const total = ((price.split(' ')[0]).replace(',',''))*num;
                    parent.closest('.table_row').find('.total').html(total.format() + ' VND');
                    var elems = document.querySelectorAll('.total'),arr   = [];
                    for (var i=elems.length; i--;)

                        arr.push(elems[i].innerHTML);
                    
                    var totalPrice = 0;

                    arr.forEach(function(item){
                        totalPrice += parseInt((item.split(' ')[0]).replace(',',''));

                    });
                    
                    $('.total-price').html(totalPrice.format()+ ' VND');
                }   
            })
        })
        
    })
    
</script>