<?php require_once("../include/session.php"); ?>
<?php require_once("../include/database.php"); ?>
<?php require_once("../include/function.php"); ?>
<?php confirm_logged_in(); ?>
<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  
  
  $fields_with_max_lengths = array("username" => 30);
  
  
  if (validate_max_lengths($fields_with_max_lengths) && validate_presences($required_fields)) {
    // Perform Create
    $username = mysql_prep($_POST["username"]);
    $hashed_password = $_POST["password"];
    
	$verify_new_username = find_admin_by_username($username);
	
	if (find_admin_by_username($username)) {
		$_SESSION["message"] = "Username already exists. ";
		redirect_to("new_user.php");
	}	
    $query  = "INSERT INTO admins (";
    $query .= "  username, password";
    $query .= ") VALUES (";
    $query .= "  '{$username}', '{$hashed_password}'";
    $query .= ")";
    $result = mysqli_query($connection,$query);
    if ($result) {
      // Success
      $_SESSION["message"] = "Admin created.";
      redirect_to("login.php");
    } else {
      // Failure
      $_SESSION["message"] = "Admin creation failed.";
    }
  }else{
    redirect_to("new_user.php");
  }
}
?>

<?php $layout_context = "admin"; ?>
<?php include("../include/header.php"); ?>
<div id="main">
  <div id="page">
    <?php echo message(); ?>
    
    <h2>Create Admin</h2>
    <form action="new_user.php" method="post">
      <p>Username:
        <input type="text" name="username" value="" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Create Admin" />
    </form>
    <br />
    <a href="login.php">Cancel</a>
  </div>
</div>
<?php include("../include/footer.php"); ?>