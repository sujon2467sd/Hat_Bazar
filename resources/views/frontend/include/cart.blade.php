<div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <span class="ltn__utilize-menu-title">Cart</span>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="mini-cart-product-area ltn__scrollbar">

        @foreach (Cart::content() as $cartItem)
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="{{ asset('product_images/'.$cartItem->options->image)}}" alt="Image"></a>

                    <a href="#" class="remove-item" data-rowid="{{ $cartItem->rowId }}" onclick="removeFromCart(event, '{{ $cartItem->rowId }}')">
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </a>

                   {{-- cart remove submit from here --}}
                   {{-- <form  action="{{ route('cart.remove', $cartItem->rowId)}}" method="POST" id="removeCart{{ $cartItem->rowId }}">
                      @csrf
                  </form> --}}

                </div>
                <div class="mini-cart-info">
                    <h6><a href="{{ route('product.details', $cartItem->id) }}">{{  $cartItem->name}}</a></h6>
                    <span class="mini-cart-quantity">{{  $cartItem->qty }}X</span>
                    <span class="mini-cart-quantity">{{  $cartItem->price }}</span>
                </div>
            </div>
        @endforeach

        </div>
        <div class="mini-cart-footer">
            <div class="mini-cart-sub-total">
                <h5>Subtotal:{{ Cart::subtotal()}}</span></h5>
            </div>
            <div class="btn-wrapper">
                <a href="{{ route('cart.show') }}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                <a href="{{ route('check.out') }}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
            </div>
            <p>Free Shipping on All Orders Over $100!</p>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function removeFromCart(event, rowId) {
    event.preventDefault();

   // Your route to remove the item from the cart


    $.ajax({
        url: "{{ route('cart.remove', '') }}/" + rowId,
        type: 'POST',
       
        data: {
            _token: '{{ csrf_token() }}',
            rowId: rowId
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Handle success response
                console.log(response.message);
                // Remove the item from the cart in the UI
                // Example: $(event.target).closest('.cart-item').remove();
                $(event.target).closest('.cart-item').remove();
                // Show toaster message
                showToast('success', response.message);
            } else {
                showToast('error', 'Failed to remove item from cart.');
            }
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(xhr.responseText);
            showToast('error', 'Failed to remove item from cart. Please try again.');
        }
    });
}

function showToast(type, message) {
    // Adjust this function based on your toaster implementation
    // Example using toastr.js for showing toasts
    if (type === 'success') {
        toastr.success(message);
    } else if (type === 'error') {
        toastr.error(message);
    }
}

</script>
