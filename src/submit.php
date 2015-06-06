<?php require("../include/session.php"); ?>
<?php require("../include/database.php"); ?>
<?php require("../include/function.php"); ?>
<?php
		global $connection;
		$q=$_GET["q"];
		$mapn = $_GET["mapn"];
		$rank = $_GET["rank"];
		$dropn = $_GET["dropn"];
		$id;
		if (isset($_SESSION['admin_id'])){
			$id = $_SESSION['admin_id'];
		}else{
			$id = 0;
		}
		$username = "123";
		if ($q == 1){
		$query  = "INSERT INTO drops (id,map,rank,ship)
		VALUES ('{$id}','{$mapn}','{$rank}','{$dropn}')";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
	}
?>