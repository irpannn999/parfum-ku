<?php 
/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
                              
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';
//SAMPLE REQUEST START HERE

// Load local environment settings. Keep the actual Server Key in ../.env.
$envPath = dirname(__DIR__) . '/.env';
if (is_readable($envPath)) {
    $environment = parse_ini_file($envPath, false, INI_SCANNER_RAW);
    foreach ($environment as $key => $value) {
        $normalizedValue = trim($value, " \t\n\r\0\x0B'\"");
        putenv($key . '=' . $normalizedValue);
    }
}

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = getenv('MIDTRANS_SERVER_KEY');
if (!\Midtrans\Config::$serverKey) {
    throw new RuntimeException('MIDTRANS_SERVER_KEY belum diatur di file .env.');
}
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = filter_var(getenv('MIDTRANS_IS_PRODUCTION'), FILTER_VALIDATE_BOOLEAN);
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $_POST['total'],
    ),
    'item_details' => json_decode($_POST['items'],true),
    'customer_details' => array(
        'first_name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
echo $snapToken;
?>
