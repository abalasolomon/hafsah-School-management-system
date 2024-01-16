@extends('layouts.structure')
@section('bread')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Cart</li>
      </ol>
    </nav>
  </div>
@endsection

@section('main')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Student</h5>
            <div class="row">
                <form action="{{ route('section.store') }}" method="post">
                    @csrf    
                    <label for="name" class="col-form-label">Select Student</label>
                    <select name="student_id" class="form-control" id="student_id" required>
                        <option value=""> --- Select Student --- </option>
                        @foreach ($students as $item)
                            <option value="{{ $item->id }}"> {{ $item->admission_number }} | {{ $item->first_name . ' ' . $item->father_name . ' ' . $item->grand_father_name }} </option>
                        @endforeach
                    </select>
                    @error('student')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</div> 

<div class="col-lg-12" id="cart-section" style="display: none;">
    <div class="card">
        <div class="card-body" id="cart">
            <h5 class="card-title">Cart</h5>
            <div class="row">
                <div class="col-md-8">
                    <table class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns table table-striped" id="cart-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item </th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Cart items will be added here dynamically -->
                        </tbody>
                    </table>
                    <div id="total" class="" style="display: none">
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf    
                        <label for="name" class=" col-form-label">Search Item</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" id="search" name="search" value="{{ old('search') }}">
                            <div id="searchResults" class="position-absolute top-100 start-0 d-none">
                                <!-- Results will be displayed here -->
                            </div>
                            @error('search')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>      
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#student_id').change(function () {
            var studentId = $(this).val();
            
            if (studentId !== '') {
                // Fetch student's cart using AJAX
                getCartData(studentId);
            } else {
                $('#cart-section').hide();
            }
        });
        $('#search').on('input', function () {
            // Get the search query
            var searchQuery = $(this).val();

            // Perform an AJAX request to fetch search results
            $.ajax({
                url: " {{ route('cart.search.items') }} ", // Replace with your actual route
                method: 'POST',
                data: { search: searchQuery, _token: '{{ csrf_token() }}' },
                success: function (data) {
                    // Update the dropdown with the search results
                    var resultsDropdown = $('#searchResults');
                    resultsDropdown.empty();

                    if (data.length > 0) {
                        $.each(data, function (index, item) {
                            resultsDropdown.append('<div class="search-result" data-item-id="' + item.id + '">' + item.name + '</div>');
                        });
                        resultsDropdown.removeClass('d-none');
                    } else {
                        resultsDropdown.addClass('d-none');
                    }
                },
                error: function (error) {
                    console.error('Error fetching search results:', error);
                }
            });
        });
        // Hide the dropdown when clicking outside
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#searchResults').length) {
                $('#searchResults').addClass('d-none');
            }
        });
    });
    $('#searchResults').on('click', '.search-result', function () {
        // Get selected item details
        var itemId = $(this).data('item-id');
        var studentId = $('#student_id').val(); // Assuming you have an input with the student_id

        // Perform an AJAX request to add the item to the cart
        $.ajax({
            url: "{{ route('cart.addItem') }}", // Replace with your actual route
            method: 'POST',
            data: {
                student_id: studentId,
                item_id: itemId,
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                // Handle success, e.g., update UI
                getCartData(studentId);
                console.log('Item added to cart:', data);
            },
            error: function (error) {
                console.error('Error adding item to cart:', error);
            }
        });
    });

    // Functions for button actions
    function increaseQuantity(studentId, itemId) {
        updateCart(studentId, itemId, 'increase');
    }

    function decreaseQuantity(studentId, itemId) {
        updateCart(studentId, itemId, 'decrease');
    }


    function updateCartSection(cartItems, studentId) {
        var cartTableBody = $('#cart-table tbody');
        var cartTotal = $('#total');
        cartTableBody.empty();
        var total = 0;
        //console.log(cartTableBody.empty());
        // Add fetched cart items to the table
        $.each(cartItems, function (index, item) {

            var row = '<tr class="table-row" data-item-id="'+ item.id +'" >' +
                '<td>' + (index + 1) + '</td>' +
                '<td>' + item.inventory.name + '</td>' +
                '<td>' + item.inventory.price + '</td>' +
                '<td>' +
                    '<button class="btn btn-success" onclick="increaseQuantity(' + studentId + ', ' + item.inventory.id + ')">+</button> <div class="quantity" >' +
                    item.quantity + 
                    '</div><button class="btn btn-warning" onclick="decreaseQuantity(' + studentId + ', ' + item.inventory.id + ')">-</button>' +
                '</td>' +
                '<td>' +
        
                '<button class="btn btn-danger" onclick="removeItemFromCart(' + studentId + ', ' + item.inventory.id + ')">Remove</button>' +
                '</td>' +
                '</tr>';
            
            cartTableBody.append(row);
            total += item.quantity * item.inventory.price;
        });

        cartTotal.html('<h2 class=" float-start"> Total : ' + total + ' </h2>' +
            '<a href="checkout/' + studentId + '" class="btn btn-info float-end">Check Out</a>');
        cartTotal.show();
        $('#cart-section').show();
    }

    // Function to increase or decrease quantity in the cart
    function updateCart(studentId, itemId, action) {
        var $item = $(".table-row[data-item-id='" + itemId + "']");
        $.ajax({
            type: 'POST',
            url: "{{ route('cart.updateCart', " + studentId + ") }}",
            data: {
                student_id: studentId,
                item_id: itemId,
                action: action,
                _token: '{{ csrf_token() }}',
            },
            success: function (response) {
                // Update the cart section with the new data
                console.log(response)
                // updateCartSection(response, studentId);
                var quantityElement = $item.find('.quantity');; // Assuming the class of the quantity field is 'quantity'
                var currentQuantity = parseInt(quantityElement.text(), 10);

                console.log(quantityElement)
                // Update the quantity based on the action (increase or decrease)
                if (action === 'increase') {
                    currentQuantity += 1;
                } else if (action === 'decrease') {
                    currentQuantity = Math.max(1, currentQuantity - 1);
                }

                // Update the quantity field in the selected row
                quantityElement.text(currentQuantity);

                

            },
            error: function (error) {
                console.error('Error updating cart:', error);
            }
        });
    }

    function getCartTotal(studentId) {
        $.ajax({
            type: 'POST',
            url: "{{ route('cart.CartTotal', " + studentId + ") }}",
            data: {
                student_id: studentId,
                _token: '{{ csrf_token() }}',
            },
            success: function (response) {
                // Update the cart section with the new data
                console.log(response);
                return response;
            },
            error: function (error) {
                console.error('Error updating cart:', error);
            }
        });
    }
    // Function to remove an item from the cart
    function removeItemFromCart(studentId, itemId) {
        var cartTotal = $('#total');
        $.ajax({
            type: 'POST',
            url: "{{ route('cart.remove-item') }}",
            data: {
                student_id: studentId,
                item_id: itemId,
                _token: '{{ csrf_token() }}',
            },
            success: function (response) {
                // Update the cart section with the new data
                var rowToRemove = $('#cart-table tbody').find('tr[data-item-id="' + itemId + '"]');
                rowToRemove.remove();
                var total = getCartTotal(studentId);
                cartTotal.html('<h2 class=" float-start"> Total : ' + total + ' </h2>' +
                                '<a href="checkout/' + studentId + '" class="btn btn-info float-end">Check Out</a>');
                    cartTotal.show();
            },
            error: function (error) {
                console.error('Error removing item from cart:', error);
            }
        });
    }

    function getCartData(studentId){
        $.ajax({
                url: 'getStudentCart/' + studentId,  // Adjust the URL based on your Laravel route
                type: 'GET',
                success: function (data) {
                    // Update the cart section with fetched data
                    if(data){
                        updateCartSection(data, studentId );    
                    }
                    
                },
                error: function (error) {
                    console.error('Error fetching student cart:', error);
                }
            });
    }
</script>
@endsection