@foreach ($products as $product)
    <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html" class="dropdown-item notify-item m-t-8 border border-primary">
        <div class="media">
            <img class="d-flex mr-2 rounded-circle" src="{{ $product->thumb }}" alt="Generic placeholder image"
                height="32">
            <div class="media-body">
                <h5 class="m-0 font-14">{{ $product->name }}</h5>
                <span class="font-12 mb-0">{{ $product->price_sale == 0 ? $product->price : $product->price_sale}} VND</span>
            </div>
        </div>
    </a>
@endforeach
