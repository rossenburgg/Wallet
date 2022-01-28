<?php
include "configuration.php";

function gencode(){
	$_SESSION["expire_code"] = time();
	$_SESSION["otpcode"] = random_int(100000, 999999);
	return $_SESSION["otpcode"];
}

function runcode($code){
	if (isset($_SESSION['start']) && ($_SESSION["expire_code"] - $_SESSION['start'] > 1000)) {
		unset($_SESSION["otpcode"]);
		unset($_SESSION["expire_code"]);
		echo "<script>swal('Code has expired')</script>";
	}else{
		if ($_SESSION["otpcode"] === $code) {
			echo "<script>swal('Account Verified')</script>";
		}else{
			echo "<script>swal('Wrong OTP code')</script>";
		}
	}
	return $res;
}

function phoneotp($phone){
	if ($phone!="") {
		$code = gencode();
		date_default_timezone_set('Africa/Accra');
	    $username = 'princeonga';
	    $password = 'encaflix123';
	    $baseUrl = 'https://api.helliomessaging.com/v1/sms';
	    $senderId = 'Wallet2.0';
	    $mobile_number = $phone;
	    $message = 'Welcome to Wallet2.0 your code is '.$code;
	            $params = [
	            'username' => $username,
	            'password' => $password,
	            'senderId' => $senderId,
	            'msisdn' => $mobile_number,
	            'message' => $message
	            ];
	    $ch = curl_init($baseUrl);
	    $payload = json_encode($params);
	            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Content-Type: application/json',
	    'Content-Length: ' . strlen($payload)
	    ));
	    $result = curl_exec($ch);
	    echo var_export($result, true);
	    curl_close($ch);
	    $res = "";
	}else{
		$res = "empty";
	}
	return $res;
}

?>