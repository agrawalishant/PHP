<?php 
require('gateway1.php');
use \P3\SDK\Gateway;
Gateway::$merchantID = '100001';
Gateway::$merchantSecret = 'Circle4Take40Idea';
$pageUrl='http://www.dvdrive.co.uk/Student/thankyou.php';
$req = array(
        'merchantID' => 100001,
        'action' => 'SALE',
        'type' => 1,
        'currencyCode' => 826,
        'countryCode' => 826,
        'amount' => 1001,
        'cardNumber' => '4012001037141112',
        'cardExpiryMonth' => 12,
        'cardExpiryYear' => 21,
        'cardCVV' => '083',
        'customerName' => 'Test Customer',
        'customerEmail' => 'test@testcustomer.com',
        'customerAddress' => '16 Test Street',
        'customerPostCode' => 'TE15 5ST',
        'orderRef' => 'Test purchase',
        // The following fields are only mandatory for 3DS v2 direct integration
        'remoteAddress' => $_SERVER['REMOTE_ADDR'],
        'threeDSRedirectURL' => $pageUrl . '&acs=1'
    );
echo Gateway::hostedRequest($req);
$newdata=file_get_contents('php://input');
print_r($newdata);exit;
?>