<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .div_center{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }
  </style>
</head>

<body>
  <div class="hero_area">

    <!-- Header section -->
   @include('home.header')
   <!-- Header section End -->

    <!-- Product details section -->


   <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">


        <div class="col-md-12">
          <div class="box">

              <div class="div_center">
                <img src="/products/{{ $data->image }}" width="400" alt="">
              </div>

              <div class="detail-box">
                <h6>{{ $data->title }}</h6>
                <h6>
                  Price
                  <span>
                    {{ $data->price }}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>Category :{{ $data->category }}</h6>
                <h6>
                  Available QTY
                  <span>
                    {{ $data->quantity }}
                  </span>
                </h6>
              </div>

              <div style="padding: 10px;">
                <p>{{ $data->description }}</p>
              </div>
          </div>
        </div>

    </div>
  </section>
    <!-- Product details section End-->

  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>