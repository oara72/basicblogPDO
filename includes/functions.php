<?php
/**
 * Created by PhpStorm.
 * User: macpro
 * Date: 3/11/17
 * Time: 11:34 AM
 */

function __autoload($class) {

    $class = strtolower($class);

    $classpath = 'classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }

    $classpath = '../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }


}

function pf_script_with_get($script) {
    $page = $script;
    $page = $page . "?";

    foreach($_GET as $key => $val) {
        $page = $page . $key . "=" . $val . "&";
    }

    return substr($page, 0, strlen($page)-1);
}

function pf_validate_number($value, $function, $redirect) {
    if(isset($value) == TRUE) {
        if(is_numeric($value) == FALSE) {
            $error = 1;
        } else {
            $error = 0;
        }

        if($error == 1) {
            header("Location: " . $redirect);
        }
        else {
            $final = $value;
        }
    }
    else {
        if($function == 'redirect') {
            header("Location: " . $redirect);
        }

        if($function == "value") {
            $final = 0;
        }
    }

    return $final;
}


$user = new User($db);

?>