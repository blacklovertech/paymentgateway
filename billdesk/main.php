<?php
include("config.php");

$order_id = "BDORDER" . rand(10000,99999);
$amount = "10.00";

$data = array(
    "merchantId" => BILLDESK_MERCHANT_ID,
    "orderId" => $order_id,
    "amount" => $amount,
    "currency" => "INR",
    "callbackUrl" => BILLDESK_CALLBACK_URL,
    "description" => "Test Product",
    "email" => "test@example.com",
    "mobileNumber" => "9999999999"
);

$signature = base64_encode(hash_hmac('sha256', json_encode($data), BILLDESK_CHECKSUM_KEY, true));
$data["signature"] = $signature;
?>

<form method="post" action="<?php echo BILLDESK_URL ?>">
    <input type="hidden" name="request" value='<?php echo json_encode($data); ?>'>
    <button type="submit">Pay with BillDesk</button>
</form>