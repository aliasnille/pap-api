<?php
/*
#####
This is a simple example how to request XML-data from PAP-API and show your result nicely.
#####
*/

// Enter your token in variable below
$token  = 'YOUR_TOKEN';

// Enter your parameters below
$url    = 'https://papapi.se/xml/?s=Birger+Jarlsgatan&c=Stockholm&token='.$token;

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

// Convert XML into an object
$xml = simplexml_load_string($response);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PAP-API: Simple example for XML</title>
	<style type="text/css" media="screen">
		body { font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; }
	</style>
</head>
<body>

<?php 
if ($xml->item) {
	// Shows your result
	foreach($xml->item as $item) {
		echo '<p>';
		echo $item->street.' '.$item->number.'<br>';
		echo $item->zipcode.' '.$item->city.'<br>';
		echo $item->municipality.', '.$item->state;
		echo '</p>';	
	}
} else {
  // If your result is empty
  echo '<p>No result!</p>';
}
?>
	
</body>
</html>