<?php

	function __proxyChecker($proxy)	{
	    $ch = curl_init("https://www.google.com.br/");
	    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
	    curl_setopt($ch, CURLOPT_PROXY, $proxy);
	    curl_setopt($ch, CURLOPT_NOBODY, true);
	    $handle = curl_exec($ch);
	    curl_close($ch);
	    return $handle ;
	}

	$proxies = "
		18.228.118.69:8080
		45.225.6.62:53281
		45.233.191.165:21776
		45.6.93.254:53281
		138.99.94.221:53281
		54.39.97.250:3128 
		177.38.187.255:53281
		177.10.65.14:21776
		177.67.217.14:53281
		177.4.174.218:80
		186.225.43.9:53281
		186.226.83.60:21776
		186.249.208.223:21776
		186.211.96.138:3128
		187.44.173.246:53281
		189.84.158.133:53281
		191.7.199.194:21776
		191.252.110.107:3128
		191.252.196.59:8080
		191.252.0.142:80
		191.252.109.210:80
		191.252.92.198:80
		200.255.122.170:8080
		186.211.4.88:20183
		186.221.100.146:8080
		189.85.161.57:20183
		186.212.112.171:20183
		170.79.31.7:21776
		168.194.153.52:21776 
	";

	$proxies = explode("\n", $proxies);

	echo "<pre>";
	$i = 0;
	foreach ( $proxies as $proxy ) {
	    
	    $proxy = trim($proxy);
	    if(empty($proxy))
	        continue ;

	    if(__proxyChecker($proxy))  
	        echo $proxy , " - " . $i . "------- OK -------  " .$i. "\n";
	    else
	        echo $proxy , " - BAD - " . $i . "\n";
	    $i++;
	}

?>

