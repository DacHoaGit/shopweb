<!--===============================================================================================-->	
<script src="{{asset("template/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("template/vendor/animsition/js/animsition.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("template/vendor/bootstrap/js/popper.js")}}"></script>
	<script src="{{asset("template/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="{{asset("template/vendor/slick/slick.min.js")}}"></script>
	<script src="{{asset("template/js/slick-custom.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("template/vendor/parallax100/parallax100.js")}}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{asset("template/vendor/MagnificPopup/jquery.magnific-popup.min.js")}}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset("template/vendor/isotope/isotope.pkgd.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("template/vendor/sweetalert/sweetalert.min.js")}}"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
				console.log(name)
			});
		});
	</script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="{{asset("template/js/main.js")}}"></script>
	<script src="{{asset("template/js/loadmore.js")}}"></script>
	<script src="{{asset("js/main.js")}}"></script>
	<script src="{{asset("template/js/search-product.js")}}"></script>

	{{-- <script src="{{asset("template/js/updatecart.js")}}"></script> --}}
