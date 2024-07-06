
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 <!-- All JS Plugins -->

 <script src="{{ asset('/')}}frontend/js/plugins.js"></script>
 <!-- Main JS -->
 <script src="{{ asset('/')}}frontend/js/main.js"></script>

 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


 {{-- AOS Animation start --}}
 <script>

AOS.init({
     duration: 1000,
   });

 </script>
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

{{-- AOS Animation start end --}}



{{-- toastr start --}}

<script>
    $(document).ready(function() {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        "error": { "color": "red" }
    }
});

</script>
{{-- toastr success messege--}}
<script>
    $(document).ready(function() {
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>

<script>
    $(document).ready(function() {
        @if(session('warning'))
            toastr.warning('{{ session('warning') }}');
        @endif
    });
</script>

{{-- toastr delete messege--}}
 <script>
    $(document).ready(function() {
        @if(session('delete_success'))
            toastr.error('{{ session('delete_success') }}');
        @endif
    });
</script>

{{-- toastr end --}}

<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    @endif

    // @if(session('success'))
    //     toastr.success('{{ session('success') }}');
    // @endif

    @if(session('error'))
        toastr.error('{{ session('error') }}');
    @endif
</script>

{{-- validation error by toster end --}}



  {{-- JavaScript Section for add to cart --}}

  <script>
    function addToCart(event, productId) {
        event.preventDefault();

      //quantity store
        var qty = $('input[name="qtybutton"]').val();
        var url = "{{ route('cart') }}"; // Route without ID parameter

        // Ajax request
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: '{{ csrf_token() }}',
                id: productId, // Pass product ID here
                qtybutton: qty // You can send other data if needed
            },
            dataType: 'json',
            success: function(response) {
                // Handle success response
                console.log(response.message);
                // Show toaster message
                showToast('success', response.message);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
                showToast('error', 'Failed to add product to cart. Please try again.');
            }
        });
    }

    //form here to show toaster messege

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


