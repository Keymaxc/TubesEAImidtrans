@if($product)
    <section class="section payment">
        <div class="container">
            <h2 class="h2 section-title title text-center">Form Pembayaran</h2>
        
            <form action="{{ route('checkout.process') }}" method="POST" class="payment-form">
                @csrf
        
                <!-- Order Summary -->
                <div class="order-summary">
                    <h3 class="h3 title">Order Summary</h3>
                    <br>
                    <div class="order-summary-content">
                        <figure class="product-image">
                            <img src="{{ asset('products/' . $product->image) }}" alt="Product Image">
                        </figure>
                        <div class="order-details">
                            <p>Produk: <strong>{{ $product->title }}</strong></p>
                            <p>Harga: <strong>{{ $product->price }}</strong></p>
                        </div>
                    </div>
                </div>
                
                <br>
                <br>
                <!-- Quantity -->
                <div class="form-group">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" name="qty" id="qty" min="1" max="100" value="1" class="input-field" required>
                </div>
        
                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="input-field" placeholder="Masukkan nama Anda" required>
                </div>
        
                <!-- Phone -->
                <div class="form-group">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" class="input-field" placeholder="Masukkan nomor telepon" required>
                </div>
        
                <!-- Address -->
                <div class="form-group">
                    <label for="address" class="form-label">Alamat Lengkap</label>
                    <textarea name="address" id="address" class="input-field" placeholder="Masukkan alamat Anda" required></textarea>
                </div>
        
                <!-- Total Price -->
                <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
            </form>
        </div>
    </section>
@endif