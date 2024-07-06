
@extends('frontend.master')

@section('title', 'CartView')

@section('content')


 <!-- BREADCRUMB AREA START -->
 <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                        <h1 class="section-title white-color">Cart</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->


  <!-- SHOPING CART AREA START -->
  <div class="liton__shoping-cart-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping-cart-inner">
                    <div class="shoping-cart-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="cartContents">
                                @foreach ($cartContents as $cartContent)
                                    <tr id="cartItem-{{ $cartContent->rowId }}">
                                        <td class="cart-product-info">
                                            <h6><a href="{{ route('product.details', $cartContent->id) }}">{{ $cartContent->name }}</a></h6>
                                            <a href="#"><img src="{{ asset('product_images/'.$cartContent->options->image)}}" alt="Image" width="50px"></a>
                                        </td>
                                        <td class="cart-product-price">{{ $cartContent->price }}&#x9F3;</td>
                                        <td class="cart-product-quantity">
                                            <input type="number" value="{{ $cartContent->qty }}" data-rowid="{{ $cartContent->rowId }}" class="qty-input">
                                        </td>
                                        <td class="cart-product-subtotal">&#x9F3;{{ $cartContent->price * $cartContent->qty }}</td>
                                        <td>
                                            <button class="remove-item" data-rowid="{{ $cartContent->rowId }}">Remove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
                        <script>
                            $(document).ready(function() {
                                // Function to show toaster messages
                                function showToast(type, message) {
                                    if (type === 'success') {
                                        toastr.success(message);
                                    } else if (type === 'error') {
                                        toastr.error(message);

                                    }

                                }

                                // Function to update cart contents
                                function updateCartContents() {
                                    $.ajax({
                                        url: "{{ route('cart.show') }}",
                                        type: "GET",
                                        dataType: "json",
                                        success: function(response) {
                                            var cartContentsHtml = '';
                                            $.each(response.cartContents, function(index, cartContent) {
                                                cartContentsHtml += '<tr id="cartItem-' + cartContent.rowId + '">' +
                                                    '<td class="cart-product-info">' +
                                                    '<h6><a href="{{ route('product.details', ':productId') }}">' + cartContent.name + '</a></h6>' +
                                                    '</td>' +
                                                    // '<td class="cart-product-info">' +
                                                    // '<h6><a href="{{ route('product.details', ':productId') }}">' + $cartContent.options.image + '</a></h6>' +
                                                    // '</td>' +
                                                    '<td class="cart-product-price">' + cartContent.price + '&#x9F3;</td>' +
                                                    '<td class="cart-product-quantity">' +

                                                    '<input type="number" value="' + cartContent.qty + '" data-rowid="' + cartContent.rowId + '" class="qty-input">' +
                                                    '</td>' +
                                                    '<td class="cart-product-subtotal">&#x9F3;' + (cartContent.price * cartContent.qty) + '</td>' +
                                                    '<td><button class="remove-item" data-rowid="' + cartContent.rowId + '">Remove</button></td>' +
                                                    '</tr>';
                                            });
                                            $('#cartContents').html(cartContentsHtml); // Update cart contents in the HTML
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error); // Log error for debugging
                                            showToast('error', 'Failed to fetch cart contents. Please try again.');
                                        }
                                    });
                                }

                                // Update cart item quantity
                                $(document).on('change', '.qty-input', function() {
                                    var rowId = $(this).data('rowid');
                                    var qty = $(this).val();
                                    $.ajax({
                                        url: "{{ route('cart.update', '') }}/" + rowId,
                                        type: 'POST',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            qtybutton: qty
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response.status === 'success') {
                                                updateCartContents(); // Refresh cart contents
                                                showToast('success', 'Cart updated successfully!');
                                            } else {
                                                showToast('error', response.message);
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(xhr.responseText);
                                            showToast('error', 'Failed to update cart. Please try again.');
                                        }
                                    });
                                });

                                // Remove cart item
                                $(document).on('click', '.remove-item', function() {
                                    var rowId = $(this).data('rowid');
                                    $.ajax({
                                        url: "{{ route('cart.remove', '') }}/" + rowId,
                                        type: 'POST',
                                        data: {
                                            _token: '{{ csrf_token() }}'
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response.status === 'success') {
                                                $('#cartItem-' + rowId).remove(); // Remove item from DOM
                                                showToast('error', 'Item removed from cart successfully!');//messege color control from here 
                                            } else {
                                                showToast('error', response.message);
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(xhr.responseText);
                                            showToast('error', 'Failed to remove item from cart. Please try again.');
                                        }
                                    });
                                });
                            });
                        </script>


                    </div>
                    <div class="shoping-cart-total mt-50">
                        <h4>Cart Totals</h4>
                        <table class="table">
                            <tbody>
                                <tr class="bg-warning">
                                    <td><b>Cart Subtotal</b></td>
                                    <td><b> &#x9F3;{{ $subtotal }}</b></td>
                                </tr>

                                <tr>
                                    {{-- <td>Shipping and Handing</td>
                                    <td>120</td> --}}
                                </tr>
                                <tr>
                                    <td>Vat</td>
                                    <td>{{ $tax }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td><strong>{{ Cart::total()}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-wrapper text-right text-end">
                            <a href="{{ route('check.out') }}" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOPING CART AREA END -->

@endsection

