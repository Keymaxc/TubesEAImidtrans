
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
    .div_deg
    {
      display: flex;
      justify-content: center;
      align-items: center0;
      margin-top: 60px;
    }

    h1{
      columns: white;
    }
    label{
      display: inline-block;
      width: 250px;
      font-sizw: 18px!important;
      color: white!important;
    }

    .input[type='text']{
      width: 350px;
      height: 50px;
    }
    .textarea{
      width: 450px;
      height: 80;
    }

    .input_deg{
      padding: 15px;
    }

    </style>


  </head>
  <body>
	@include('admin.header')

	@include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      

    <div class="page-content">
        <div class="page-header">
            <div class="container">
                <h2>Edit Produk</h2>
                <form action="{{ route('admin.updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Nama Produk</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $product->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" id="description" required>{{ $product->desc }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="form-label">Stok</label>
                        <input type="number" name="qty" class="form-control" id="qty" value="{{ $product->quantity }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>

        
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>