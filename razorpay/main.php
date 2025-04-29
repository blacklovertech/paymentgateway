<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <button id="rzp-button">Pay with Razorpay</button>
    <script>
        var options = {
            "key": "<?php echo RAZORPAY_KEY_ID; ?>",
            "amount": "1000",
            "currency": "INR",
            "name": "Test Product",
            "description": "Dummy Payment",
            "image": "https://your-logo.com/logo.png",
            "handler": function (response){
                window.location.href = "response.php?payment_id=" + response.razorpay_payment_id;
            },
            "prefill": {
                "name": "John Doe",
                "email": "john@example.com",
                "contact": "9999999999"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp = new Razorpay(options);
        document.getElementById('rzp-button').onclick = function(e){
            rzp.open();
            e.preventDefault();
        }
    </script>
</body>
</html>