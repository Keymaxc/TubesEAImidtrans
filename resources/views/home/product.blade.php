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
                            <form action="{{ url('add_cart', $products->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
