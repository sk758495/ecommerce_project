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
                    <h1 style="color:white;">Add Category</h1>
                    <div class="div_deg">
                        <form action="{{ url('add_category') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" name="category" id="">
                                <input type="submit" class="btn btn-primary" value="Add Category">
                            </div>
                        </form>
                    </div>

                    <table class="table-deg">
                        <tr>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->category_name }}</td>
                            <td>
                                <a href="{{ url('edit_category', $item->id) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('delete_category', $item->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                            </td>
                           
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
                <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript files-->
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
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
