<div class="row mt-5">
    @if (\Cart::isEmpty())
        <div class="col-md-12 text-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" viewBox="0 0 24 24">
                    <path
                        d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z">
                    </path>
                </svg>
            </div>
            <h3 class="text-bold">Cart is empty</h3>
            <a href="{{ route('products.index') }}" class="btn btn-outline-dark mt-3">Products</a>
        </div>
    @else
        <div class="col-lg-12 pl-3 pt-3">
            <table class="table table-hover border bg-white">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th style="width:10%;">Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\Cart::getContent()->sort() as $item)
                        <tr>
                            <td class="align-middle">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <img src="{{ asset('/storage/images/products/' . $item->associatedModel->image) }}"
                                            alt="..." class="img-fluid" />
                                    </div>
                                    <div class="col-lg-10">
                                        <h4>{{ $item->name }}</h4>
                                        <p>{{ $item->associatedModel->description }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"> {{ number_format($item->price) }} </td>
                            <td class="align-middle" style="width: 15%">
                                <button wire:loading.attr="disabled" wire:target="increment({{ $item->id }})"
                                    wire:click="increment({{ $item->id }})" class="btn btn-sm btn-dark me-2">
                                    +
                                    <div wire:loading wire:target="increment({{ $item->id }})">
                                        <div class="spinner-border spinner-border-sm"></div>
                                    </div>
                                </button>

                                <span>{{ $item->quantity }}</span>

                                <button wire:loading.attr="disabled" wire:target="decrement({{ $item->id }})"
                                    wire:click="decrement({{ $item->id }})" class="btn btn-sm btn-dark ms-2">
                                    -
                                    <div wire:loading wire:target="decrement({{ $item->id }})">
                                        <div class="spinner-border spinner-border-sm"></div>
                                    </div>
                                </button>
                            </td>
                            <td class="align-middle"> {{ number_format($item->price * $item->quantity) }} </td>
                            <td class="align-middle" style="width:15%;">
                                <button wire:loading.attr="disabled" wire:target="delete({{ $item->id }})"
                                    wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm">
                                    delete
                                    <div wire:loading wire:target="delete({{ $item->id }})">
                                        <div class="spinner-border spinner-border-sm"></div>
                                    </div>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <button wire:click="clearCart" class="btn btn-dark">Clear Cart</button>
                        </td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center" style="width:15%;"><strong>Total :
                                {{ number_format(\Cart::getTotal()) }}</strong></td>
                        <td><a href="#" class="btn btn-success btn-block">Checkout</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endif
</div>
