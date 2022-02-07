<!DOCTYPE html>
<html>
<head>
	<title>API</title>
</head>
<body>
<?php
function usd_to_ghs(){
	$c = curl_init('https://www.google.com/search?q=usd+to+ghs&oq=usd+to+ghs&aqs=chrome..69i57.4030j0j4&sourceid=chrome&ie=UTF-8');
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec($c);
	$ar = explode(' ', $page);
	$arr = $ar[481];
	$arrr = explode('>', $arr);
	return $arrr[1];
	curl_close($c);
}

function ghs_to_usd(){
	$c = curl_init('https://www.google.com/search?q=ghs+to+usd&oq=ghs+to+usd&aqs=chrome..69i57j0i512l2j0i22i30l7.9691j1j9&sourceid=chrome&ie=UTF-8');
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec($c);
	$ar = explode(' ', $page);
	$arr = $ar[480];
	$arrr = explode('>', $arr);
	return $arrr[1];
	curl_close($c);
}

?>
</body>
</html>