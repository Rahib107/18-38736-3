<?php
    session_start();
    if (! isset($_SESSION['user'])){
    	header("Location:Login.php");
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1> welcome,<?php echo $_SESSION['user']; ?></h1>
	<br>
	<br>
	<a href="Dashbord.php">Dashbord</a>
	<br>
	<br>
	<a href="user.json">view patient</a>


    <br>
	<br>
	<a href="RegistrationAction.php">Add Patient</a>

    <br>
	<br>

	<a href="changePassword.php">changePassword</a>

     <br>
	<br>

	<a href="Logout.php">Logout</a>
	 </form>

</body>
</html>