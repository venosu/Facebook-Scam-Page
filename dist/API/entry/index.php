<?php @error_reporting(0);
require '../lib/configClass.php';

$config = new Config;
$config->load('../config.php');

session_start();    

$_SESSION["logged"] = false;

function get_path() {
    $path = explode('/', $_SERVER['SCRIPT_NAME']);
    array_pop($path);
    array_pop($path);
    array_pop($path);
    $abspath = implode('/', $path);
    if(isset($_SERVER['HTTPS'])) {
        return 'https://'.$_SERVER['HTTP_HOST'].$abspath.'/app.php';
    } else {
    	return 'http://'.$_SERVER['HTTP_HOST'].$abspath.'/app.php';
    }
}
$path = get_path();

if (isset($_GET['xkey'])) {
    $xkey = $_GET['xkey'];
    $mysql = NEW MySQLi($config->get('db.host'), $config->get('db.user'),$config->get('db.pass'),$config->get('db.name'));
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $result = $mysql->query("SELECT expired,xkey FROM links WHERE expired = 0  AND xkey = '$xkey' LIMIT 1");
    } catch(Exception $e) {
        die("<h2>Auth_Mode is activated and no premade access tokens are present on the database, first generate some tokens then try again. Here is the error code: $e</h2>");
    }
    if ($result->num_rows == 1) {
        $update = $mysql->query("UPDATE links SET expired = 1 WHERE xkey = '$xkey' LIMIT 1");
        if ($update) {
            $_SESSION["logged"] = true;
            header("Location: ".$path);
            exit();
        } else {
            header("HTTP/1.0 404 Not Found");
        }
    }else {
        header("HTTP/1.0 404 Not Found");
    }
}else {
    header("HTTP/1.0 404 Not Found");
}