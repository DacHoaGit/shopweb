<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body >
	
	<!-- Header -->
    @include('header')

	<!-- Cart -->
	@include('cart')

	<!-- Product -->
	<section class="bg0 p-t-100 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					{{$title}}
				</h3>
			</div>

            <div class="flex-w flex-sb-m p-b-52">

				<div class="flex-w flex-c-m m-tb-10">
					
					<a class="p-all-10 flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 p m-r-8 m-tb-4" href="{{request()->url()}}">
						Default
					</a>
					<a class="p-all-10 flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 p m-r-8 m-tb-4" href="{{request()->fullUrlWithQuery(['price' => 'asc'])}}">
						Price: Low to High
					</a>
					<a class="p-all-10 flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 p m-r-8 m-tb-4" href="{{request()->fullUrlWithQuery(['price' => 'desc'])}}">
						Price: High to Low
					</a>
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
					
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" id="sac">
							<i class="zmdi zmdi-search"></i>
						</button>
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" id="search-product" type="text" onkeyup="searchProduct(this)" name="search-product" placeholder="Search">
					</div>	
					<div  class = "display-search" style="max-height: 42vh; overflow:scroll;">
			
					</div>
				</div>
			</div>
			<div id="loadProduct">
				@include('list')
			</div>

			<!-- Load more -->
            {!!$products -> links('pagination::bootstrap-4') !!}
		</div>
	</section>


@include('footer')
</body>
</html>