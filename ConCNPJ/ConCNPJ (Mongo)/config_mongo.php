<?php 
	require 'vendor/autoload.php';

	try{
		$client = new MongoDB\Client();

		$cnpjSC = $client->cnpjSC;

		$Ccollection = $cnpjSC->createCollection('cnpjsc');

		echo '<pre>' ."MongoDB pronto". '</pre>';
	
	}catch(MongoConnectionException $e){
		die($e->getMessage()); 
	}
?>