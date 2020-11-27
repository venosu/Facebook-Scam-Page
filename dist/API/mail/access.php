<?php

session_start();
require '../lib/configClass.php';

$config = new Config;
$config->load('../config.php');

if (isset($_POST['screen_resolution']) && isset($_POST['browser'])) {
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $ip = !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] :  $_SERVER['REMOTE_ADDR'];

    $message = "";
    $message .= "=============BROWSER SCAN==============\n";

    if(!$ch = curl_init()){

        $message .= " Couldn't initialize cURL API - not enough data\n" ;
        $message .= " If this problem persists consider using a different host\n";
        $message .= "\n";
        $message .= ' User Agent           : '.$ua."\n";
        $message .= ' IP Address           : '.$ip."\n";
        $message .= "========================================\n";
    }else {
        curl_setopt($ch, CURLOPT_URL, 'https://ipapi.co/'.$ip.'/json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER,  array('user-agent: curl/7.68.0'));
        $output = curl_exec($ch);
        
        if ($output === FALSE) {



            $message .= "              cURL error occured\n" ;
            $message .= " If this problem persists contact the developer\n";
            $message .= " ---- Error Text ---- : ".curl_error($ch)."\n";
            $message .= "\n";
            $message .= ' User Agent           : '.$ua."\n";
            $message .= ' IP Address           : '.$ip."\n";
            $message .= "========================================\n";
        }else {
            $message .= " IP address           : ".json_decode($output)->ip."\n";
            $message .= ' City                 : '.json_decode($output)->city."\n";
            $message .= ' Zip code             : '.json_decode($output)->postal."\n";
            $message .= ' Region               : '.json_decode($output)->region."\n";
            $message .= ' Country              : '.json_decode($output)->country_name."\n";
            $message .= ' Internet service(ISP): '.json_decode($output)->org."\n";
            $message .= ' User Agent           : '.$ua."\n";
        }
        curl_close($ch);
    }
    $message .= ' Browser              : '.$_POST['browser']."\n";
    $message .= ' Screen resolution    : '.$_POST['screen_resolution']."\n";
    $_SESSION['USER'] = $message;
}