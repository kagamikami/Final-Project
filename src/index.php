<?php require_once("../include/session.php"); ?>
<?php require_once("../include/database.php"); ?>
<?php require_once("../include/function.php"); ?>
<?php include("../include/header.php"); ?>

<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
?>
<div id="left_frame">
  <div id="account">
  		<?php  if (!isset($_SESSION['admin_id'])){ ?>
			<a href="login.php"><li class = "element">Login</li></a> 
		<?php  }else{ 
			$id = $_SESSION['username'];
			echo "<p> $id</p>";
			?>
			<a href="logout.php"><li class = "element">Logout</li></a>
		<?php  } ?>

  </div>
  	<a href="index.php" target = "_self"><li><div class="main_menu">Index</div></a>
	<li><div class="main_menu">Menu</div>
	<ul class="sub_menu">
		<a href="drop_table.php" target = "_self"><li class = "element">Drop Table</li></a>
		<a href="submit1.php" target = "_self"><li class = "element">Submit drop</li></a>
	</ul>
	</li>
	</div>
<div id = "right_frame">
</div>
<?php include("../include/footer.php"); ?>