<?php
$response = $_POST;

if ($response["STATUS"] == "TXN_SUCCESS") {
    echo "Transaction Successful!<br>";
    echo "Order ID: " . $response["ORDERID"] . "<br>";
    echo "Txn ID: " . $response["TXNID"] . "<br>";
} else {
    echo "Transaction Failed or Cancelled.<br>";
    echo "Reason: " . $response["RESPMSG"];
}
?>