<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container">
                <h1>Product List</h1>
            
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product) <!-- Perbaiki dari $products menjadi $product -->
                            <tr>
                                <td>{{ $product->id }}</td> <!-- Perbaiki dari $product->id -->
                                <td>{{ $product->title }}</td> <!-- Perbaiki dari $product->title -->
                                <td>{{ $product->price }}</td> <!-- Perbaiki dari $product->price -->
                                <td>
                                    <div class="img-box">
                                        <!-- Perbaiki untuk menunjukkan gambar yang benar -->
                                        <img src="{{ asset('products/' . $product->image) }}" alt="Product Image" width="100" height="100">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.editProduct', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>
