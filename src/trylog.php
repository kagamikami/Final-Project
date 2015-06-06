<?php require_once("../include/session.php"); ?>
<?php require_once("../include/database.php"); ?>
<?php require_once("../include/function.php"); ?>
<?php confirm_logged_in()?>
<?php
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  $username = $_GET["username"];
  $password = $_GET["password"];
  
  if (validate_presences_log($required_fields,$username,$password)) {
    // Attempt Login

		
		$admin = attempt_login($username, $password);
    if ($admin) {
      // Success
			// Mark user as logged in
			$_SESSION["admin_id"] = $admin["ID"];
			$_SESSION["username"] = $admin["username"];
    } else {
      // Failure
      $response = "Username/password not found.";
      echo $response;
    }
  }else{
  }
?>