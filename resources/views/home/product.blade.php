<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
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
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach ( $product as $products )
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <a href="">
                            <div class="img-box">
                                <img src="{{ asset('products/' . $products->image) }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    {{ $products->title }}
                                </h6>
                                <h6>
                                    Price
                                    <span>
                                        {{ $products->price }}
                                    </span>
                                </h6>
                            </div>
                        </a>
                        <div style="padding:15px;">
                            <form action="{{ route('checkout.process')  }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input type="number" name="qty" class="form-control" id="qty" placeholder="Total">
                                  </div>
                                  <div class="mb-3">
                                    <label for="name" class="form-label">User Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                                  </div>
                                  <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Input Phone Number">
                                  </div>
                                  <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea  name="address" class="form-control"  id="address" rows="3"></textarea>
                                  </div>
                                <button type="submit" class="btn btn-primary" id = "pay-button">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>