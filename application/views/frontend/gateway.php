<?PHP
// Signature key entered on MMS. The demo accounts is fixed to this value,
//$key = 'NNQtrarWqrsu3Fd3';    // Live Key
//'merchantID' => '133015',     // Live Merchant id
$key = 'Circle4Take40Idea';     // Testing Key
//'merchantID' => '100001',     //Testing merchant id
// Gateway URL
$url = 'https://gateway.cardstream.com/hosted/';
//$url = 'https://gateway.cardstream.com/devtools/sigtest.php?key=NNQtrarWqrsu3Fd3';
if (!isset($_POST['responseCode'])) {
// Send request to gateway
// Request
$req = array(
 'merchantID' => '100001',  
 'action' => 'SALE',
 'type' => 1,
 'countryCode' => 826,
 'currencyCode' => 826,
 'amount' => $amt,
 'orderRef' => 'DV Drive purchase',
 'transactionUnique' => uniqid(),
 'redirectURL' => ($_SERVER['HTTPS'] == 'on' ? 'https' : 'http') . '://www.dvdrive.co.uk/Student/thankyou1/'.$rand,
//$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
 );
// echo Gateway::hostedRequest($req);
  //$newdata=file_get_contents('php://input');
  //$newdata=file_get_contents('php://acquirerTransactionID');
//   $data1 = array();
//   parse_str($newdata,$data1);
//   print_r($newdata);
//   print_r($data1);exit;
 // echo $newdata.'<br>';
//  print_r($newdata);
 //exit;
 //echo '<pre>';print_r($acquirerTransactionID);exit;
//https://www.dvdrive.co.uk/Student/thankyou
// Create the signature using the function called below.
$req['signature'] = createSignature($req, $key);
echo '<form action="' . htmlentities($url) . '" method="post" id="myForm">' . PHP_EOL;
 foreach ($req as $field => $value) {
 echo '<input type="hidden" name="' . $field . '" value="' .
htmlentities($value) . '">' . PHP_EOL;
 }
 echo '<input type="hidden" value="Pay Now" id="tnc">' . PHP_EOL;
echo '</form>' . PHP_EOL;
} else {
// Handle the response posted back
$res = $_POST;
// Extract the return signature as this isn't hashed
$signature = null;
if (isset($res['signature'])) {
 $signature = $res['signature'];
 unset($res['signature']);
 } 
 // Check the return signature
if (!$signature || $signature !== createSignature($res, $key)) {
 // You should exit gracefully
 die('Sorry, the signature check failed');
 }
// Check the response code
if ($res['responseCode'] === "0") {
 echo "<p>Thank you for your payment.</p>";
 } else {
 echo "<p>Failed to take payment: " . htmlentities($res['responseMessage']) .
"</p>";
 }
}
// Function to create a message signature
function createSignature(array $data, $key) {
// Sort by field name
ksort($data);
// Create the URL encoded signature string
$ret = http_build_query($data, '', '&');
// Normalise all line endings (CRNL|NLCR|NL|CR) to just NL (%0A)
$ret = str_replace(array('%0D%0A', '%0A%0D', '%0D'), '%0A', $ret);
// Hash the signature string and the key together

return hash('SHA512', $ret . $key);
//define('SHA512', 'SHA512');

//return $ret . $key;
}
?>
<script>
document.forms["myForm"].submit();
</script>