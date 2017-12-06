<?php
$strAccessToken = '0F6MLXJTUnJlEmb19Clr2AF0wrhF3m9NA/JCsojO5epXp8fv3RAS7XRd2s/RyWIIHmVbmLNtbcdDl3gVnZMM/VqLzjpSuZdaR5lMtfZVM6Ub8xr8axXSrNfSGodz8KOlfM58Nn6SN1XqBnVAcV4ozgdB04t89/1O/w1cDnyilFU=';
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
 
 
$userAccountName ='9ead'; 
//$strAccessToken = "ACCESS_TOKEN";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "fc"){
	$memberprofile =  getUserAccountID($arrJson['events'][0]['source']['userId']);

	
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีค่ะ ยินดีต้อนรับสมาชิกคนใหม่ / wellcome to muangkan united fanclub".$memberprofile;
  
  
  
   //getUserAccountID($arrJson['events'][0]['source']['userId']);
  
  //$arrJson['events'][0]['source']['userId']
  
} 
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);



function getUserAccountID($userAccount)
{
	global $strAccessToken;
	$strUrl = 'https://api.line.me/v2/bot/profile/'.$userAccount;
	$arrHeader = array();
	$arrHeader[] = "Content-Type: application/json";
	$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$strUrl);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($ch);
	curl_close ($ch);
	
	$userMember=$result["displayName"].'/'.$result["userId"].'/'.$result["pictureUrl"];
	return $userMember;
	//"displayName":"LINE taro",
  //  "userId":"U4af4980629...",
   // "pictureUrl":"http://obs.line-apps.com/...",
	
	
}
 