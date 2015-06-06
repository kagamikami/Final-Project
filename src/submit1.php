<?php require_once("../include/session.php"); ?>
<?php require_once("../include/database.php"); ?>
<?php require_once("../include/function.php"); ?>
<?php include("../include/header.php"); ?>
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

<div class = "submitp">
		<div id = "sele">Mapname</div>
		<select name = "here" id = "mapn">
			<option value = "E1">E1</option>
			<option value = "E2">E2</option>
		</select>
		<div id = "sele">Rank</div>
		<input type = "text" id = "rank">
		<div id = "sele">Drop</div>
		<select name = "dropn" id = "dropn">
			<option value = "yamato">Yamato</option>
			<option value = "musashi">Musashi</option>
			<option value = "kongou">Kongou</option>
			<option value = "haruna">Haruna</option>
		</select>
		<input type = "submit" name = "asbumit" value = "submit" onclick = "det()">
<section>
<table id = "bmessage">

</table>
</section>
<?php include("../include/footer.php"); ?>