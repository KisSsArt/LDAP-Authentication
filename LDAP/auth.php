<?php include "ldap.php" ?>
<html><link rel="stylesheet" href="style.css"></html>
<html>
	<h1>LDAP Authentication</h1>
	
	<form method="post" action="" name="authform">
		<p><lable>
			Username:<br>
			<input name="username", size="25", type="text">
		</lable></p>
	
		<p><lable>
			Password:<br>
			<input name="password", size="25", type="password">
		</lable></p>
	
		<button type="submit" name="login", value="login">Sign In</button>
	</form>
</html>
<?php

	session_start();

	init_ldap_server_connection();

	if (isset($_POST['login']))
	{
		if (!connect_to_ldap($_POST['username'], $_POST['password']))
		{
			echo "Connection error!";
		}
		else
		{
			$_SESSION['user_id'] = $_POST['username'];
			header("Location: index.php");
		}
	}

?>
