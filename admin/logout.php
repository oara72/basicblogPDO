<?php
//include config
require_once('../includes/config.php');

// If the user is logged in, delete the session vars to log them out
session_start();

// Destroy the session
session_destroy();

// Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
setcookie('id', '', time() - 3600);
setcookie('username', '', time() - 3600);

//log user out
$user->logout();
header('Location: index.php');

?>