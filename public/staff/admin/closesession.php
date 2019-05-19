<?php require_once('../../../private/initialize.php');
session_start();
session_destroy();

$_SESSION = array();
redirect_to(url_for('/staff/index.php'));

?>
