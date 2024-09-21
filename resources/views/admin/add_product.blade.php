<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">

        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        label{
            display: inline-block;
            width: 200px;
            font-size: 18px!important;
            color: white!important;
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

            <h1 style="color: white">Add Product</h1>

            <div class="div_deg">
                <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input_deg">
                        <label>Product Title</label>
                        <input type="text" name="title" id="" required>
                    </div>

                    <div class="input_deg">
                        <label>Product Description</label>
                    <textarea name="description" id="" required></textarea>
                    </div>

                    <div class="input_deg">
                        <label>Product Price</label>
                    <input type="text" name="price" id="" required>
                    </div>

                    <div class="input_deg">
                        <label>Product Quantity</label>
                    <input type="number" name="quantity" id="" required>
                    </div>

                    <div class="input_deg">

                        <label>Product Category</label>


                    <select name="category" id="" required>

                        <option value="">Select a Option</option>

                        @foreach ($category as $item)

                        <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>

                        @endforeach

                    </select>

                    </div>

                   <div class="input_deg">
                    <label>Product Image</label>
                    <input type="file" name="image" id="" required>
                   </div>

                   <div class="input_deg">
                    <input type="submit" name="submit" class="btn btn-success" value="Add Product" id="">
                   </div>

                </form>
            </div>

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
