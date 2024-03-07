<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment</title>
</head>

<body>

    <form id="payment-form" action="https://sandbox-cdnv3.chillpay.co/Payment/" method="post" role="form"
        class="form-horizontal">
        <modernpay:widget id="modernpay-widget-container" data-merchantid="M035127"
            data-amount="{{ $order_data->total_price * 100 }}" data-orderno="{{ $order_data->id }}"
            data-customerid="{{ $order_data->customers_user_name }}" data-mobileno="{{ $order_data->tel }}"
            data-clientip="101.108.2.106" data-routeno="1" data-currency="764"
            data-lang="TH" data-description="{{ $order_data->code_order }}"
            data-apikey="fF4Wj10VenREBWV5PmgjiTqYpBlXpzVWkYQXkqW8fLBCtHohx1yoxTrMtqdw4PYg">
        </modernpay:widget>

    </form>



</form>
<script async src="https://sandbox-cdnv3.chillpay.co/js/widgets.js?v=1.00" charset="utf-8"></script>
</body>


