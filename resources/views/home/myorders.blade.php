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
        width: 600px;
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
</style>
</head>

<body>
  <div class="hero_area">

    <!-- Header section -->
   @include('home.header')
   <!-- Header section End -->

   <table class="table-deg">
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Delivery Status</th>
        <th>Image</th>

    </tr>
    @foreach ($order as $item)
    <tr>
        <td>{{ $item->product->title }}</td>
        <td>{{ $item->product->price }}</td>
        <td>{{ $item->status }}</td>

        <td>
            <img src="products/{{ $item->product->image }}" height="120" width="120" alt="">
        </td>


    </tr>
    @endforeach
</table>





</div>
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

</body>

</html>
