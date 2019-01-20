<?php
function curlGet($Url){
    if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }
    $ch = curl_init();
     if (!defined('CURL_HTTP_VERSION_2_0')) {
        define('CURL_HTTP_VERSION_2_0', 3);
    }
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_REFERER, "https://hakim.one/bot");
    curl_setopt($ch, CURLOPT_USERAGENT, "HakimMonitoringBot/1.0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function notifyOk($name) {
    global $tChatID;
    global $tToken;
    $msg = 'Website ' . $name. " is up at " .date("h:i A");
    $data = [
        'text' => $msg,
        'chat_id' => $tChatID
    ];

    file_get_contents("https://api.telegram.org/bot$tToken/sendMessage?" . http_build_query($data) );
}

function notifyError($name) {
    global $tChatID;
    global $tToken;
    $msg = 'Website ' . $name. " is down at " .date("h:i A");
    $data = [
        'text' => $msg,
        'chat_id' => $tChatID
    ];

    file_get_contents("https://api.telegram.org/bot$tToken/sendMessage?" . http_build_query($data) );
}