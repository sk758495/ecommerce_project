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
            width: auto;
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

         

            <h1 style="color: white">View All Orders</h1>

            <table class="table-deg">
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print PDF</th>
                    
                </tr>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->rec_address }}</td>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->product->price }}</td>

                    <td>
                        <img src="products/{{ $item->product->image }}" height="120" width="120" alt="">
                    </td>

                    <td>

                        @if ( $item->status == 'in progress' )

                        <span style="color: red;">{{ $item->status }}</span>

                        @elseif ( $item->status == 'on the way' )

                        <span style="color: skyblue;">{{ $item->status }}</span>

                        @else

                        <span style="color: yellow;">{{ $item->status }}</span>
                            
                        @endif
                    </td>

                    <td>
                        <div style="display: flex; gap: 10px;">
                            <a class="btn btn-primary" href="{{ url('on_the_way',$item->id) }}">On the way</a>

                            <a class="btn btn-success" href="{{ url('deleverd',$item->id) }}">Delivered</a></div>
                    </td>

                    <td>
                        <a class="btn btn-secondary" href="{{ url('print_pdf',$item->id) }}">Pdf</a>
                    </td>
                   
                </tr>
                @endforeach
            </table>            

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
