<?php

$curl = curl_init();



 curl_setopt_array($curl, [
	CURLOPT_URL => "https://shazam.p.rapidapi.com/search?term=indaclub",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: shazam.p.rapidapi.com",
		"X-RapidAPI-Key: 407d8d59a9msh912ab63539b0acap138cdbjsne358903c5953"
	],
]);
$response = curl_exec($curl);
if($response === false){
	var_dump(curl_error($curl));
}else{
	$response = json_decode($response, true);
	
	
		
	
	};
		




?>




