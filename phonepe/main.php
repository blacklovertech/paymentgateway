<?php include("config.php");

$order_id = "PP" . rand(10000,99999);
$data = array(
    "merchantId" => PHONEPE_MERCHANT_ID,
    "merchantTransactionId" => $order_id,
    "merchantUserId" => "MUID123",
    "amount" => 1000,
    "redirectUrl" => PHONEPE_CALLBACK_URL,
    "redirectMode" => "POST",
    "callbackUrl" => PHONEPE_CALLBACK_URL,
    "mobileNumber" => "9999999999",
    "paymentInstrument" => array(
        "type" => "PAY_PAGE"
    )
);

$payload = base64_encode(json_encode($data));
$checksum = hash('sha256', $payload . "/pg/v1/pay" . PHONEPE_SALT_KEY) . "###" . PHONEPE_SALT_KEY;

$headers = array(
    "Content-Type: application/json",
    "X-VERIFY: $checksum"
);

$ch = curl_init(PHONEPE_BASE_URL . "/pg/v1/pay");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("request" => $payload)));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
echo $response;
?>