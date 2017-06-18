<?php
/*
#####
This is a simple example how to request JSON-data from PAP-API and show your result nicely.
#####
*/

// Enter your token in variable below
$token  = 'YOUR_TOKEN';

// Enter your parameters below
$url    = 'https://papapi.se/json/?s=Birger+Jarlsgatan&c=Stockholm&token='.$token;

// Start a new cURL session
$ch = curl_init();

// Set some cURL options
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
));

// Execute your request
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Decodes JSON into a PHP variable
$json = json_decode($response, true);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PAP-API: Simple example for JSON</title>
	<style type="text/css" media="screen">
		body { font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; }
	</style>
</head>
<body>

<?php 
if (!$json['result']['message']) {
	// Shows your result
	foreach($json['result'] as $item) {
		echo '<p>';
		echo $item['street'].' '.$item['number'].'<br>';
		echo $item['zipcode'].' '.$item['city'].'<br>';
		echo $item['municipality'].', '.$item['state'];
		echo '</p>';	
	}
} else {
  // If your result is empty
  echo '<p>No result!</p>';
}
?>
	
</body>
</html>