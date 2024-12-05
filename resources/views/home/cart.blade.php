<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

    @include('home.slider')

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->



  <!-- end shop section -->
  




  <section class="shop_section layout_padding">
    <div class="container">
        <!-- Pesan Notifikasi -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
        <!-- End Pesan Notifikasi -->

        <div class="heading_container heading_center">
            <h2>
                Your Cart
            </h2>
        </div>
        <div class="row">
            @foreach ($cartItems as $item) <!-- Mengakses $cartItems, bukan $product -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <a href="">
                            <div class="img-box">
                                <img src="{{ asset('products/' . $item->product->image) }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    {{ $item->product->title }} <!-- Mengakses produk dari cart -->
                                </h6>
                                <h6>
                                    Price
                                    <span>
                                        {{ $item->product->price }}
                                    </span>
                                </h6>
                            </div>
                        </a>
                        <div style="padding:15px;">
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="total_price">
            <h4>Total: {{ $totalPrice }}</h4>
        </div>
    </div>
</section>


  <!-- contact section -->


  <br><br><br>

  <!-- end contact section -->

   

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