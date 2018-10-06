<?php

function sendSMS($mobNum, $pos){
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://rest.nexmo.com/sms/json");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "api_key=20aa8dbe&api_secret=gsrHhUy70vG0MS0y&to=639219870637&from=\"PREVIOUSMO\"&text=\"NASEND KO NA!");
	curl_setopt($ch, CURLOPT_POST, 1);

	$headers = array();
	$headers[] = "Content-Type: application/x-www-form-urlencoded";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
	    echo 'Error:' . curl_error($ch);
	}
	curl_close ($ch);
	return 'NASEND KO NA';
}

function itexmo($number,$message){
	$ch = curl_init();
	$itexmo = array('1' => $number, '2' => $message, '3' => 'TR-MIKEJ870637_7EDCM');
	curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, 
	          http_build_query($itexmo));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec ($ch);
	curl_close ($ch);

	return 'Natext ko na!';
}