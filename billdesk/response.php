<?php
$response = json_decode(file_get_contents("php://input"), true);

if (!$response) {
    echo "No data received.";
    exit;
}

$status = $response["transaction"]["status"] ?? "UNKNOWN";

if ($status == "SUCCESS") {
    echo "BillDesk Transaction Successful!<br>";
    echo "Order ID: " . $response["transaction"]["orderId"] . "<br>";
} else {
    echo "Transaction Failed or Pending.<br>";
}
?>