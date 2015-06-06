<?php
//table

function tabletop(){
	echo '<tr id = "abcd"><td>Map</td><td>ship</td><td>amount</td><td>S</td>
	<td>A</td><td>B</td><td>percentage</td>';
	if (isset($_SESSION['admin_id'])){
		echo '<td>Your drop</td>';
	}
	echo "</tr>";
}

function tablecons($mapp,$name){
	$query  = "SELECT * ";
	global $connection;
	$total;
				$query .= "FROM drops ";
				$query .= "WHERE map = '{$mapp}'  ";
				$numbers = mysqli_query($connection,$query);
				$total = $numbers->num_rows;

				$query  = "SELECT * ";
				$query .= "FROM drops ";
				$query .= "WHERE map = '{$mapp}' and ship = '{$name}' ";
				$numbers = mysqli_query($connection, $query);
				$number = $numbers->num_rows;

				$query  = "SELECT * ";
				$query .= "FROM drops ";
				$query .= "WHERE map = '{$mapp}' and ship = '{$name}' and rank = 'S'";
				$numbers = mysqli_query($connection, $query);
				$Snumber = $numbers->num_rows;

				$query  = "SELECT * ";
				$query .= "FROM drops ";
				$query .= "WHERE map = '{$mapp}' and ship = '{$name}' and rank = 'A' ";
				$numbers = mysqli_query($connection, $query);
				$Anumber = $numbers->num_rows;

				$query  = "SELECT * ";
				$query .= "FROM drops ";
				$query .= "WHERE map = '{$mapp}' and ship = '{$name}' and rank = 'B' ";
				$numbers = mysqli_query($connection, $query);
				$Bnumber = $numbers->num_rows;
				if ($total > 0){
					$percent = $number/$total;
				}else{
					$percent = 0;
				}
				if (isset($_SESSION['admin_id'])){
					$id = $_SESSION['admin_id'];

					$query  = "SELECT * ";
					$query .= "FROM drops ";
					$query .= "WHERE map = '{$mapp}' and id = '{$id}' and ship = '${name}' ";
					$numbers = mysqli_query($connection, $query);
					$Ynumber = $numbers->num_rows;

					tablerow($mapp,$name,$number,$Snumber,$Anumber,$Bnumber,$percent,$Ynumber);
				}else{
					tablerow($mapp,$name,$number,$Snumber,$Anumber,$Bnumber,$percent,'-1');
				}
}
function tablerow($m,$s,$a,$sn,$an,$bn,$p,$id){
	echo "<tr><td>$m</td><td>$s</td><td>$a</td><td>$sn</td>
	<td>$an</td><td>$bn</td><td>$p</td>";
	if ($id != '-1'){
		echo "<td>$id</td>";
	}
	echo "</tr>";
}

function redirect_to($new_location) {
	 header("Location: " . $new_location);
	 exit;
}

//log in
function logged_in() {
	return isset($_SESSION['admin_id']);
}
	
function confirm_logged_in() {
	if (logged_in()) {
		redirect_to("index.php");
	}
}
function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
}

function fieldname_as_text($fieldname) {
  $fieldname = str_replace("_", " ", $fieldname);
  $fieldname = ucfirst($fieldname);
  return $fieldname;
}

function has_presence($value) {
	return isset($value) && $value !== "";
}

function validate_presences_log($required_fields,$username,$password) {
    $value = trim($username);
  	if (!has_presence($value)) {
  		$s =  "Username can't be blank";
  		echo $s;
  		return null;
  	}
  	$value = trim($password);
  	if (!has_presence($value)) {
  		$s = "Password can't be blank";
  		echo $s;
  		return null;
  	}
  return true;
}
function validate_presences($required_fields) {
  foreach($required_fields as $field) {
    $value = trim($_POST[$field]);
  	if (!has_presence($value)) {
  		$_SESSION['message'] = fieldname_as_text($field) . " can't be blank";
  		return null;
  	}
  }
  return true;
}
function has_max_length($value, $max) {
	return strlen($value) <= $max;
}
function mysql_prep($string) {
		global $connection;
		
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}
function validate_max_lengths($fields_with_max_lengths) {
	// Expects an assoc. array
	foreach($fields_with_max_lengths as $field => $max) {
		$value = trim($_POST[$field]);
	  if (!has_max_length($value, $max)) {
	    $_SESSION['message'] = fieldname_as_text($field) . " is too long";
	    return null;
	  }
	}
	return true;
}
function find_admin_by_username($username) {
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}

function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}

function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
		if ($admin) {
			// found admin, now check password
			if ($password === $admin["password"]) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}

?>