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
  	$memberprofile =  getUserAccountID($arrJson['events'][0]['source']['userId']);
	list($membername,$memberimg,$memmberdesc)=explode(",",$memberprofile);
	
if($arrJson['events'][0]['message']['text'] == ""){
   $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีค่ะ/welcome ".$membername." ยินดีต้อนรับสมาชิกคนใหม่ / wellcome to muangkan united fanclub";
}else if($arrJson['events'][0]['message']['text'] == "fc"){
   $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีค่ะ/welcome ".$membername." ยินดีต้อนรับสมาชิกคนใหม่ / wellcome to muangkan united fanclub";
}else if($arrJson['events'][0]['message']['text'] == "game"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีค่ะ/welcome ".$membername." ขอบคุณสำหรับการร่วมเล่นเกมส์กับเรา รอประกาศผลรางวัลผ่านหน้าแฟนเพจสโมสรนะคะ,thank you for join we game please review fc fanpage after hour.";
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



function getUserAccountID($strAccessToken,$userAccount)
{
	global $strAccessToken;
 	    $ch = curl_init('https://api.line.me/v2/bot/profile/'.$userAccount);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charser=UTF-8',
			'Authorization: Bearer ' . $strAccessToken
		));
		$result = curl_exec($ch);
		curl_close($ch); 

	
	$obj = json_decode($result);
	$uname = $obj->displayName;
	$img = $obj->pictureUrl;
	$desc =$obj->statusMessage;
	$userMember = $uname.','.$img.','.$desc;
    return $userMember;

 }
 