<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandbox.momodeveloper.mtn.com/collection/token/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Ocp-Apim-Subscription-Key: f824faa3238941cf9eee32ef2863473d',
    'Authorization: Basic YmQ4NDk3YzUtYTUwMy00MGQ3LWIxZWEtY2M4ZDdkNDdhMGYzOmZhZGYxYTNkNTBlNjRjZmM4NWQ0ZDExMDE4ZjNmY2Jm'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;