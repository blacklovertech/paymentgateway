<?php
include("config.php");

$posted = array();
$posted['key'] = PAYU_MERCHANT_KEY;
$posted['txnid'] = 'TXN' . rand(10000,99999);
$posted['amount'] = '10.00';
$posted['firstname'] = 'John';
$posted['email'] = 'john@example.com';
$posted['phone'] = '9999999999';
$posted['productinfo'] = 'Test Product';
$posted['surl'] = PAYU_SUCCESS_URL;
$posted['furl'] = PAYU_FAILURE_URL;

$hash_string = $posted['key'].'|'.$posted['txnid'].'|'.$posted['amount'].'|'.$posted['productinfo'].'|'.$posted['firstname'].'|'.$posted['email'].'|||||||||||'.PAYU_SALT;
$hash = strtolower(hash('sha512', $hash_string));
$posted['hash'] = $hash;

$payu_url = PAYU_BASE_URL . '/_payment';
?>

<form action="<?php echo $payu_url ?>" method="post">
<?php
foreach ($posted as $key => $value) {
    echo "<input type='hidden' name='$key' value='$value' />";
}
?>
    <input type="submit" value="Pay with PayU" />
</form>