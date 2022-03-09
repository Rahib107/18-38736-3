
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		login
	</title>
</head>
<body>
	
	<?php 
	include("LoginAction.php");
	?>

	<center>
		

	<h1>Login Page</h1>
	<br><br>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method ="POST">
		<fieldset>
			<legend>Please Login</legend>
		Username:
		<input type="Text" name="username">
		<br>
		<br>
		
		Password:
		<input type="Text" name="password">
		<br>
		<br>
 
		<input type="submit" name="submit" Value="Login">
	</fieldset>
	</form>



	Not Registered yet? please <a href="RegistrationAction.php">Click here</a> for login.

	<br><br>
	  
</center>

</body>
</html>
