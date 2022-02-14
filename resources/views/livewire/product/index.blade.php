<div class="row mt-5 g-3">
    <div>
        <a class="btn btn-dark" href="{{ route('products.create') }}">Create Product</a>
    </div>
    @foreach ($products as $product)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/images/products/' . $product->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button wire:loading.attr="disabled" wire:target="addToCart({{ $product->id }})"  wire:click="addToCart({{ $product->id }})" class="btn btn-outline-success btn-sm">
                        Add To Cart
                        <div wire:loading wire:target="addToCart({{ $product->id }})">
                            <div class="spinner-border spinner-border-sm"></div>
                        </div>
                    </button>
                    <span>{{ number_format($product->price) }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
