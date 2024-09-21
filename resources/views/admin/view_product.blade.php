<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
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
            color: white;
        }
        td{
            color:white;
            padding: 10px;
            border: 1px solid skyblue;
        }
    </style>
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  </head>
  <body>
    <!-- Header Start-->
    @include('admin.header')
    <!-- Header End-->

    <!-- Sidebar Navigation-->
    <div class="d-flex align-items-stretch">

      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <form action="{{ url('product_search') }}" method="get">
                @csrf
                <div>
                    <input type="search" name="search" style="font-size: 16px!important; width: 350px; height: 40px ;" placeholder="Search Product by Name and Category Name">
                    <input type="submit" class="btn btn-primary" value="search">
                </div>
            </form>

            <h1 style="color: white">View Product</h1>

            <table class="table-deg">
                <tr>
                    <th>id</th>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($product as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{!! Str::limit($item->description, 50) !!}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>

                    <td>
                        <img src="products/{{ $item->image }}" height="120" width="120" alt="">
                    </td>
                    <td>
                        <a href="{{ url('Update_product', $item->id) }}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <a href="{{ url('delete_product', $item->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>

                </tr>
                @endforeach
            </table>            

              </div>
              <div class="div_deg">
                {{ $product->onEachSide(1)->links() }}
              </div>
            </div>
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>


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
