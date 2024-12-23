<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<section class="shop_section layout_padding">
    <div class="container">

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
                            <a href="{{ route('checkout.show') }}" class="btn btn-primary">Checkout</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>