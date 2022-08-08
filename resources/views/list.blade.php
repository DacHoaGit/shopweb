<div class="row isotope-grid">
    @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <span class="block1-name stext-106  ">
                                {{ $product->name }}
                            </span>
                            
                            <span class="stext-105 cl3">
                                @if ($product->price_sale)
                                    <span class="fs-15 lh-12 m-r-6" style="color: red;">
                                        <i class="zmdi zmdi-fire"></i>
                                    </span>
                                    Flash Sale: {!! number_format($product->price_sale) !!} VND
                                @else
                                    Price: {!! number_format($product->price) !!} VND
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
