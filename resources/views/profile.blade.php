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
        <h2> Hello {{ auth()->user()->name }} !</h2>
    </div>

    <section class="bg0 p-t-100 p-b-140">
        <div class="container">
            <h3 class="text-success" style="margin-bottom:9px;">Personal information</h3>
            <div class="form-group mb3 ">
                <label for="email">Email address</label>
                <input type="" class="form-control" id="email" aria-describedby="emailHelp" value="{{auth()->user()->email}}" readonly>
            </div>
            <div class="form-group mb3">
                <label for="created_at">Created at</label>
                <input type="" class="form-control" id="created_at" aria-describedby="emailHelp" value="{{auth()->user()->created_at}}" readonly>
            </div>

            <form  method="POST">
                <div class="form-group mb3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                @csrf
            </form>

            <h3 class="text-success" style="margin: 50px 0px 9px 0px;">Change Password</h3>
            <div>
            <form method="POST">
                @csrf
                <input type="hidden" class="form-control" name="email" aria-describedby="emailHelp" value="{{auth()->user()->email}}" readonly>
                <div class="form-group">
                    <label for="password">Current Password</label>
                    <input type="password" class="form-control" name="old_password" id="password" placeholder="Current Password">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="confirm_new_password">Confirm New Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirm_new_password" placeholder="Confirm New Password">
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
        </div>
    </section>

    @include('footer')
</body>
</html>
