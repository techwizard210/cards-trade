<
<!DOCTYPE html>
<html><head>
<title>Pay-Per-Product Cryptocoin (payments in multiple cryptocurrencies) Payment Example</title>
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='Expires' content='-1'>
<script src='cryptobox.min.js' type='text/javascript'></script>
</head>
<body style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;margin:0'>
<div align='center'>

    <form id="payment-form" method="post" action="{{ route('payments.crypto.pay') }}">
        @csrf
        <input type="text" name="amountUSD" placeholder="Amount">
          <input type="hidden" name="userID" value="1">
        <input type="hidden" name="orderID" value="1">
        <input type="hidden" name="redirect" value="{{ url()->full() }}">
        <button type="submit">Pay</button>
      </form>
</div>
</body>
</html>
