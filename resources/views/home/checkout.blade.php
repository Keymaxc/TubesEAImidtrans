@extends('home.index') <!-- Pastikan menggunakan layout yang benar -->

@section('content')
    <div class="container">
        <h2>Checkout</h2>

        <!-- Tampilkan Pesan Notifikasi -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach ($cartItems as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('products/' . $item->product->image) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $item->product->title }}</h6>
                            <p>Price: {{ $item->product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="total">
            <h3>Total Price: {{ $totalPrice }}</h3>
        </div>

        <!-- Proses checkout -->
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <!-- Misalnya, tambahkan formulir untuk pengisian alamat atau metode pembayaran -->
            <button type="submit" class="btn btn-success">Confirm and Pay</button>
        </form>
    </div>
@endsection
