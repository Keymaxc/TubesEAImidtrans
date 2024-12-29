<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Invoice - Shoppie</title>

  <link rel="stylesheet" href="styles.css"> <!-- Link to your custom styles if any -->

  <style>
    /* Styling invoice */
    .invoice-container {
      width: 50%; /* Lebar container lebih sempit agar lebih vertikal */
      height: auto;
      margin: 50px auto;
      padding: 40px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .invoice-header,
    .invoice-footer {
      text-align: center;
      margin-bottom: 20px;
    }

    .invoice-header h1,
    .invoice-details p,
    .invoice-total p,
    .invoice-footer {
      text-align: center;
    }

    .invoice-header h1 {
      font-size: 2.5rem;
      color: #333;
    }

    .invoice-header p {
      font-size: 1rem;
      color: #777;
    }

    .invoice-details {
      margin-bottom: 30px;
    }

    .invoice-details p {
      margin: 8px 0;
      font-size: 1rem;
    }

    .invoice-details .order-summary {
      margin-top: 20px;
      font-size: 1.1rem;
    }

    .invoice-total {
      font-size: 1.5rem;
      font-weight: bold;
      margin-top: 30px;
    }

    .invoice-footer {
      font-size: 1rem;
      color: #aaa;
      margin-top: 30px;
    }

    .btn {
      background-color: #007BFF;
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }

    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>

  <div class="invoice-container">
    <!-- Invoice Header -->
    <div class="invoice-header">
      <h1>Tagihan  - Komsteer Skate</h1>
      <p>Klik Bayar !!!!!!!</p>
    </div>

    <!-- Invoice Details -->
    <div class="invoice-details">
      <div class="order-summary">
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Name:</strong> {{ $order->name }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
        <p><strong>Quantity:</strong> {{ $order->qty }}</p>
      </div>
    </div>
    
    <!-- Invoice Total -->
    <div class="invoice-total">
        <p><strong>Total Price:</strong> Rp {{ $order->qty * 825000 /* Replace with actual price logic */ }}</p>
    </div>

    <!-- Invoice Footer -->
    <div class="invoice-footer">
      <a id="pay-button" class="btn">Bayar</a>
    </div>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtras.clientKey') }}"></script>

<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function(result){
        /* You may add your own implementation here */
        alert("payment success!"); console.log(result);
      },
      onPending: function(result){
        /* You may add your own implementation here */
        alert("waiting for your payment!"); console.log(result);
      },
      onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
      },
      onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
      }
    })
  });
</script>

</html>


