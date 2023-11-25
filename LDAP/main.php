<html><link rel="stylesheet" href="style.css"></html>
<?php

	session_start();
	
	if (!isset($_SESSION['user_id']))
	{
		header("Location: /auth.php");
		exit;
	}
	
	echo "Loggined as: " . $_SESSION['user_id'] . " | " . "Group: " . $_SESSION['ou'] . " | ";

?>
<html>
	<form method="post" id="signoutform">
		<button type="submit" name ="sign_out" value="sign_out">Sign Out</button>
	</form>
</html>
<?php 
	if (isset($_POST['sign_out'])) 
	{ 
		session_unset(); 
		header("Location: /index.php"); 
	}
	
	if ($_SESSION['ou'] == "Gamer")
	{
		echo "<hr><br> <h1>Очень важные данные для просмотра которых необходимо пройти аутентификацию LDAP</h1>";
?>
	<html>
		<p><img src="Images/wolf.jpeg"></p>
	</html>
<?php
	}
	else if ($_SESSION['ou'])
	{
		echo "<hr><br> <h1>Это не очень важные данные для которых все еще необходимо пройти аутентификацию LDAP</h1>";
		
?>
	<html>
		<p><img src="Images/tuesday.jpg"></p>
	</html>
<?php
	}
?>
