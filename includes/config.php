<?php
ob_start();
session_start();

//database credentials
define('DBHOST','localhost');
define('DBUSER','user');
define('DBPASS','password');
define('DBNAME','blogpdo');

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//Set Timezone
date_default_timezone_set("America/Toronto");

//load classes as needed
function __autoload($class) {

    $class = strtolower($class);

    //if call from within /assets adjust the path
    $classpath = 'classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }

    //if call from within admin adjust the path
    $classpath = '../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }

    //if call from within admin adjust the path
    $classpath = '../../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }

}

$user = new User($db);
?>
