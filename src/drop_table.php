<?php require_once("../include/session.php"); ?>
<?php require_once("../include/database.php"); ?>
<?php require_once("../include/function.php"); ?>
<?php include("../include/header.php"); ?>
<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
if (isset($_POST['submit'])){
	redirect_to("submit.html");
}

?>
<div id="left_frame">
  <div id="page">
  		<?php  if (!isset($_SESSION['admin_id'])){ ?>
			<p>Welcome!</p>
			<a href="login.php">Login</a> 
		<?php  }else{ 
			$id = $_SESSION['username'];
			echo "<p> $id</p>";
			?>
			<a href="logout.php">Logout</a>
		<?php  } ?>

  </div>
  <a href="index.php" target = "_self"><li><div class="main_menu">Index</div></a>
	<li><div class="main_menu">EVENT MAP</div>
	<ul class="sub_menu">
	<form  method="post" value = "Map">
		<select name = "where">
			<option value = "E1">E1</option>
			<option value = "E2">E2</option>
		</select>
		<input type = "submit" name = "map" value = "search">
	</form>
	</ul>
	</li>
	<li><div class="main_menu">Menu</div>
		<ul class="sub_menu">
			<a href="submit1.php" target = "_self"><li class = "element">Submit drop</li></a>
		</ul>
	</li>
</div>
<div >
	<table>
		<?php
			tabletop();
			global $connection;
			if (isset($_POST['where'])){
				$total;
				$mapp = $_POST['where'];

				tablecons($mapp,'Yamato');
				tablecons($mapp,'haruna');
				tablecons($mapp,'kongou');
				tablecons($mapp,'musashi');
				
			}
		?>
	</table>
</div>

<?php include("../include/footer.php"); ?>