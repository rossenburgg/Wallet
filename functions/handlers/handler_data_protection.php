<?php

function Encrypt($data) {
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$encryption_iv = '1234567891011121';
	$encryption_key = "thisismywalletkey";
	$encryption = openssl_encrypt($data, $ciphering,$encryption_key, $options, $encryption_iv);
	return $encryption;
}

function Decrypt($data) {
	$options = 0;
	$ciphering = "AES-128-CTR";
	$decryption_iv = '1234567891011121';
	$decryption_key = "thisismywalletkey";
	$decryption=openssl_decrypt ($data, $ciphering, $decryption_key, $options, $decryption_iv);
	return $decryption;
}

?>