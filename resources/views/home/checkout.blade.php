@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Checkout</div>
                <div class="card-body">
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" name="qty" class="form-control" id="qty" placeholder="Enter quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter your address" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Submit Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
