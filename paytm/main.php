<?php
include("config.php");

$order_id = "ORDER" . rand(10000,99999);
$amount = "10.00";
$cust_id = "CUST001";

$params = array(
    "MID" => PAYTM_MID,
    "ORDER_ID" => $order_id,
    "CUST_ID" => $cust_id,
    "TXN_AMOUNT" => $amount,
    "CHANNEL_ID" => PAYTM_CHANNEL_ID,
    "WEBSITE" => PAYTM_WEBSITE,
    "INDUSTRY_TYPE_ID" => PAYTM_INDUSTRY_TYPE_ID,
    "CALLBACK_URL" => PAYTM_CALLBACK_URL
);

ksort($params);
$checksum = getChecksumFromArray($params, PAYTM_MERCHANT_KEY);

$paytm_url = "https://securegw-stage.paytm.in/order/process";

function getChecksumFromArray($arr, $key) {
    return hash_hmac('sha256', json_encode($arr, JSON_UNESCAPED_SLASHES), $key);
}
?>

<form method="post" action="<?php echo $paytm_url ?>" name="f1">
<?php
foreach ($params as $name => $value) {
    echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
}
?>
<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checksum ?>">
<button type="submit">Pay with Paytm</button>
</form>