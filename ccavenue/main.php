<?php include("config.php");

$merchant_data = '';
$paramList = array(
    "merchant_id" => CCAVENUE_MERCHANT_ID,
    "order_id" => "CCA" . rand(10000,99999),
    "currency" => "INR",
    "amount" => "10.00",
    "redirect_url" => CCAVENUE_REDIRECT_URL,
    "cancel_url" => CCAVENUE_REDIRECT_URL,
    "language" => "EN"
);

foreach ($paramList as $key => $value) {
    $merchant_data .= $key . '=' . $value . '&';
}

$encrypted_data = base64_encode($merchant_data); // placeholder for actual encryption
?>

<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
    <input type="hidden" name="encRequest" value="<?php echo $encrypted_data ?>">
    <input type="hidden" name="access_code" value="<?php echo CCAVENUE_ACCESS_CODE ?>">
    <input type="submit" value="Pay with CCAvenue">
</form>