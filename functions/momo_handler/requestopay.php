<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "amount": "5.0",
  "currency": "EUR",
  "externalId": "8926920",
  "payer": {
    "partyIdType": "MSISDN",
    "partyId": "0550114944"
  },
  "payerMessage": "Deposit money into your account",
  "payeeNote": "Wallet2.0"
}',
  CURLOPT_HTTPHEADER => array(
    'X-Reference-Id: bd8497c5-a503-40d7-b1ea-cc8d7d47a0f3',
    'X-Target-Environment: sandbox',
    'Ocp-Apim-Subscription-Key: f824faa3238941cf9eee32ef2863473d',
    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6ImJkODQ5N2M1LWE1MDMtNDBkNy1iMWVhLWNjOGQ3ZDQ3YTBmMyIsImV4cGlyZXMiOiIyMDIyLTAxLTI1VDIwOjIzOjI5LjEwOSIsInNlc3Npb25JZCI6ImFmOTVlNjhhLTA2ODUtNGZjOC05MDg2LWIwNzQ0ZDEzNmRiYiJ9.i7aE8-sFDZBBOA7dl3313pr56PqDRFWSP0lY9JDaLKfDgGoJ5QSKSAaVBRKdG4u7bmbwrxjV0TbnviFHs8FraM3uMJPX34TaohJr-fVaVPsPQhfUUVfiPR-UWGfIGSzee1KS7JLn3YLn2pIcL2oKvvuTp_CcaKaG3a8ZNuI1M8pWiI9MrRVJCvz1xXwwANiwHSrXoP15SOvOWPWl-uInc7eMgVIOLqSDAe3GZPAb3AY2fSnbLe4odT5rAmM-oWHIW4wcNMU2cVmml3ZBDEnLgKvCXSzrsvnqc_BZvA3dd1kZtKPFS8f2EJfvSUSmkuvqiC46EGv1agFTodaR3lO89w',
    'Content-Type: text/plain'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
