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
                Profile
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
        <h2> My Order </h2>
    </div>

    <section class="bg0 p-t-100 p-b-140">
        <div class="container">
            <table class="table table-striped table-centered mb-0" id="table-data">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->quantity}}</td>
                            <td>{{$customer->total_price}}</td>
                            <td>
                                @if ($customer->status==0)
                                    <span class="text-muted">{{App\Enums\CustomerStatus::getKey($customer->status)}}</span>
                                @elseif ($customer->status==1)
                                    <span class="text-info">{{App\Enums\CustomerStatus::getKey($customer->status)}}</span>
                                @elseif ($customer->status==2)
                                    <span class="text-info">{{App\Enums\CustomerStatus::getKey($customer->status)}}</span>
                                @else
                                    <span class="text-danger">{{App\Enums\CustomerStatus::getKey($customer->status)}}</span>
                                @endif
                            </td>
                            <td>{{$customer->created_at}}</td>
                            <td><a href="/payment/{{$customer->id}}" class="btn btn-info">{!! $customer->status==0 ? 'Continute to Payment' : 'See Details' !!}</a></td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @include('footer')
</body>
</html>
