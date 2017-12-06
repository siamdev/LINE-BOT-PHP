<?php
$channelsecret='bb46be362d742f6664237df10bd2fc5e';
$accessToken='0F6MLXJTUnJlEmb19Clr2AF0wrhF3m9NA/JCsojO5epXp8fv3RAS7XRd2s/RyWIIHmVbmLNtbcdDl3gVnZMM/VqLzjpSuZdaR5lMtfZVM6Ub8xr8axXSrNfSGodz8KOlfM58Nn6SN1XqBnVAcV4ozgdB04t89/1O/w1cDnyilFU=';

$userAccount='U67c9626692cbfd5881c1892a578c0a14';
$ch = curl_init('https://api.line.me/v2/bot/profile/'.$userAccount);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
));
$result = curl_exec($ch);
print_r($result);
 curl_close($ch); 

?>