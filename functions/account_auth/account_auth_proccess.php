<?php
include "configuration.php";

function gencode(){
	$_SESSION["otpcode"] = random_int(100000, 999999);
	return $_SESSION["otpcode"];
}

function verifyotp($code){
	global $con;
	$userid = $_SESSION['wallet_account_id'];
	if ($code == $_SESSION["otpcode"]) {
		$sql = "UPDATE `accounts` SET `account_verified_phone` = '1' WHERE `accounts`.`account_id` = '$userid';";
		if ($con->query($sql) === TRUE) {
			echo "<script>swal('Account verified successfully');
		setTimeout(function(){window.location = '../../account/';},1500);
		</script>";
		}
		else{
			echo "<script>swal('Account verification failed');</script>";
		}
		
	}else{
		echo "<script>swal('Wrong OTP code')</script>";
	}
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
	    $re = json_decode($result, true);
	    if ($re['responseCode'] == "200") {
	    	echo "<script>swal('Code has been sent');</script>";
	    }else{
	    	echo "<script>swal('There was an error sending code;</script>";
	    }
	    // echo var_export($result['responseCode'], true);
	    curl_close($ch);
	    $res = "";
	}else{
		$res = "<script>swal('Phone number was empty');</script>";
	}
	return $res;
}

?>