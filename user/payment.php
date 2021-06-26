<?php


function getUrlContent($url,$data)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	$data = curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	return ($httpcode>=200 && $httpcode<300) ? $data : false;
	}
function pay($cardno,$cvv,$expiry,$amount,$to="3447483647095542")
{
	$gateway_url="http://localhost/payment_gateway/transfer.php";
	$data="from=$cardno&to=$to&cvv=$cvv&expiry=$expiry&amount=$amount&to=$to";
	$res=getUrlContent($gateway_url,$data);
	//var_dump($res);
	return json_decode($res,true);
}




?>
