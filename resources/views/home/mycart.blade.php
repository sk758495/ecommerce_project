<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <!-- Include Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <style type="text/css">
    input[type='text']{
        width: 400px;
        height: 50px;
    }
    .cart_value{
        margin-bottom: 70px;
        text-align: center;
        margin: 18px;
    }

    .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
    }
    .table-deg{
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 50px;
        width: 900px;
    }
    th{
        background-color:skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: black;
    }
    td{
        color:black;
        padding: 10px;
        border: 1px solid skyblue;
    }


.order_deg{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 60px;
}
label{
    display: inline-block;
    width: 200px;
    font-size: 18px!important;
    color: black!important;
}
input[type='text']{
    width: 350px;
    height: 50px;
}
textarea{
    width:450px;
    height: 80px;
}
.input_deg{
    padding:15px;
}

</style>
</head>

<body>
  <div class="hero_area">

    <!-- Header section -->
   @include('home.header')
   <!-- Header section End -->


   <!-- Cart section  -->
   <div class="order_deg">

    <form action="{{ url('confirm_order') }}" method="POST">
        @csrf

        <div class="input_deg">
            <label for="">Receiver Name</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}">
        </div>

        <div class="input_deg">
            <label for="">Receiver Address</label>
            <textarea name="address" value="" cols="30" rows="10">{{ Auth::user()->address }}</textarea>
        </div>

        <div class="input_deg">
            <label for="">Receiver Phone</label>
            <input type="text" name="phone" value="{{ Auth::user()->phone }}">
        </div>

        <div class="input_deg">
            <input class="btn btn-primary" type="submit" value="cash on delivery" id="">

            <a href="" class="btn btn-success">Pay On Card</a>
        </div>

    </form>

</div>

  <div>

    <table class="table-deg">


        <tr>
            <th>Product Title</th>
            <th>Price</th>
           <th>Image</th>
           <th>Remove</th>
        </tr>

        <?php

        $value = 0;

         ?>

        @foreach ($cart as $cart)
        <tr>
            <td style="text-align: left;">{{ $cart->product->title }}</td>
            <td>{{ $cart->product->price }}</td>
            <td>
                <img src="products/{{ $cart->product->image }}" height="120" width="120" alt="">
            </td>

            <td>
                <a href="{{ url('remove_cart', $cart->id) }}" class="btn btn-danger" onclick="confirmation(event)">Remove</a>
            </td>

        </tr>

        <?php
        $value = $value + $cart->product->price;

         ?>

        @endforeach


    </table>
    </div>

    <div class="cart_value">
        <h3>Total value of cart is : <span style="font-weight: 800; color: green;"> $ {{ $value }}</span></h3>
    </div>


   <!-- cart section End -->



  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr Notification Script -->
    @if (session('success'))
        <script>
            $(document).ready(function() {
                toastr.success("{{ session('success') }}", 'Success', {
                    closeButton: true
                });
            });
        </script>
    @endif

       <!-- SweetAlert Script -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

       <script type="text/javascript">
       function confirmation(ev) {
           ev.preventDefault();

           var urlToRedirect = ev.currentTarget.getAttribute('href');

           swal({
               title: 'Are you sure to delete this category?',
               text: 'This action will be permanent',
               icon: 'warning',
               buttons: true,
               dangerMode: true,
           })
           .then((willDelete) => {
               if (willDelete) {
                   window.location.href = urlToRedirect;
               }
           });
       }
       </script>

</body>

</html>
