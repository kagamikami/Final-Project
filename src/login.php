<?php require_once("../include/session.php"); ?>
<?php require_once("../include/database.php"); ?>
<?php require_once("../include/function.php"); ?>
<?php include("../include/header.php"); ?>
<?php confirm_logged_in()?>
<div id="main">
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
  <div id="e">
    <table id = "errorm">
    </table>
  </div>
  <div id="page">
    <h2>Login</h2>
      <p>Username:
        <input type="text" name="username" id = "username"  >
      </p>
      <p>Password:
        <input type="password" name="password" id = "password">
      </p>
      <input type="submit" name="submit" value="Submit" onclick = "trylog()">
      <input type="button" name="newuser" onclick = "window.location.href='new_user.php'"  value = "create account" />
  </div>

</div>
  <p> <span id="txtHint"></span></p>
<?php include("../include/footer.php"); ?>