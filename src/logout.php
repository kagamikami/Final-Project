<?php require_once("../include/session.php"); ?>
<?php require_once("../include/function.php"); ?>
<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
?>
<?php
	$_SESSION["admin_id"] = null;
	$_SESSION["username"] = null;
	$_SESSION["message"] = null;
	redirect_to("index.php");
?>
