<?php
if (isset($_GET['payment_id'])) {
    echo "Payment Successful with Razorpay!<br>";
    echo "Payment ID: " . htmlspecialchars($_GET['payment_id']);
} else {
    echo "Payment failed or was cancelled.";
}
?>