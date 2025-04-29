<?php include("config.php");

$order_id = "CF" . rand(10000,99999);
$data = array(
    "order_id" => $order_id,
    "order_amount" => 10.00,
    "order_currency" => "INR",
    "customer_details" => array(
        "customer_id" => "cust123",
        "customer_email" => "john@example.com",
        "customer_phone" => "9999999999"
    ),
    "order_note" => "Test Order",
    "order_meta" => array(
        "return_url" => CASHFREE_CALLBACK_URL
    )
);

$headers = array(
    "Content-Type: application/json",
    "x-api-version: 2022-09-01",
    "x-client-id: " . CASHFREE_APP_ID,
    "x-client-secret: " . CASHFREE_SECRET_KEY
);

$ch = curl_init(CASHFREE_API_URL);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
echo $response;
?>