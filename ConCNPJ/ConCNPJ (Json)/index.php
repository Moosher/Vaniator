<?php

	$cnpj_list = fopen("CNPJ_SC.txt", "r") or die ("Não foi possível abrir o arquivo");	
	$json = fopen("results.json", "w");
	
	$count = 0;
	$proxy = [];
    $proxy[0] = "";
    $proxy[1] = "18.228.118.69:8080";
    $proxy[2] = "45.225.6.62:53281";
    $proxy[3] = "45.233.191.165:21776";
    $proxy[4] = "45.6.93.254:53281";
    $proxy[5] = "138.99.94.221:53281";
    $proxy[6] = "54.39.97.250:3128"; 
    $proxy[7] = "177.38.187.255:53281";
    $proxy[8] = "177.10.65.14:21776";
    $proxy[9] = "177.67.217.14:53281";
    $proxy[10] = "177.4.174.218:80";
    $proxy[11] = "186.225.43.9:53281";
    $proxy[12] = "186.226.83.60:21776";
    $proxy[13] = "186.249.208.223:21776";
    $proxy[14] = "186.211.96.138:3128";
    $proxy[15] = "187.44.173.246:53281";
    $proxy[16] = "189.84.158.133:53281";
    $proxy[17] = "191.7.199.194:21776";
    $proxy[18] = "191.252.110.107:3128";
    $proxy[19] = "191.252.196.59:8080";
    $proxy[20] = "191.252.0.142:80";
    $proxy[21] = "191.252.109.210:80";
    $proxy[22] = "191.252.92.198:80";
    $proxy[23] = "200.255.122.170:8080";
    $proxy[24] = "186.211.4.88:20183";
    $proxy[25] = "186.221.100.146:8080";
    $proxy[26] = "189.85.161.57:20183";
    $proxy[27] = "201.42.58.72:8080";
    $proxy[28] = "186.212.112.171:20183";
    $proxy[29] = "170.79.31.7:21776";
    $proxy[30] = "168.194.153.52:21776";    
	
	$i = 0;
	while(!feof($cnpj_list)){
		
		$line_read = fgets($cnpj_list);
	
		if($line_read != null){		
			
			$line_read = substr($line_read, 2, 14);
							
			connect($proxy[$i]);

		}	
	}

	function connect($proxyC){

		$url = 'https://www.receitaws.com.br/v1/cnpj/';

		global $i, $line_read, $proxy , $json, $count; 

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url . $line_read);
		curl_setopt($ch, CURLOPT_PROXY, $proxyC);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$retorno_json = curl_exec($ch);
		curl_close($ch);

		if($retorno_json != null){

			fwrite($json, $retorno_json);

			echo "<pre>". $count++ . "</pre>";
			
			$i++;
			if($i > 30){
			$i = 0;
			}
			
			flush();
			ob_flush();	
		
		}else{

			$i++;
			if($i > 30){
				$i = 0;					
			}

			connect($proxy[$i]);								
		}
	}	
	fclose($json);
	fclose($cnpj_list);

?>
