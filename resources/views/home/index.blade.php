<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <!-- Include Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>
  <div class="hero_area">

    <!-- Header section -->
   @include('home.header')
   <!-- Header section End -->


    <!-- slider section -->

   @include('home.slider')

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
   @include('home.product')
  <!-- end shop section -->







  <!-- contact section -->

  @includeIf('home.contact')

  <!-- end contact section -->

   

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