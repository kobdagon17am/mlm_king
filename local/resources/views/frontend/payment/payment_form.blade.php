
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Payment Demo</title>
</head>
<body>
<form id="payment-form" action="https://sandbox-cdnv3.chillpay.co/Payment/" method="post" role="form" class="form-horizontal">
<modernpay:widget id="modernpay-widget-container"
data-merchantid="M035017" data-amount="10000" data-orderno="00000001" data-customerid="123456"
data-mobileno="0889999999" data-clientip="171.96.189.232" data-routeno="1" data-currency="764"
data-description="Test Payment" data-apikey="deBt8n0E32YfBo1hmY8amyObqoiJfcAUU2JIhVGHFWhlCmpWJ8kwhcKcbOe3xAFA">
</modernpay:widget>
<button type="submit" id="btnSubmit" value="Submit" class="btn">Payment</button>
</form>
<script async src="https://sandbox-cdnv3.chillpay.co/js/widgets.js?v=1.00" charset="utf-8"></script>
</body>
</html>
