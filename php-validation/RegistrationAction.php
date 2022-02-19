<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
</head>
<body>

	<?php 
		$firstnameErrorMsg = $lastnameErrorMsg = $genderErrorMsg =$birthdayErrorMsg =$religionErrorMsg=
		$addressErrorMsg=  $emailErrorMsg =  $unameErrorMsg = $passErrorMsg= $cpassErrorMsg="";
	?>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);

				return $data;
			}

			$firstname = test($_POST["firstname"]);
			$lastname = test($_POST["lastname"]);
			$birthday = test($_POST["birthday"]);
			$religion = test($_POST["religion"]);
			$address = test($_POST["address"]);
			$email = test($_POST["email"]);
			$uname = test($_POST["uname"]);
			$pass = test($_POST["pass"]);
			$cpass = test($_POST["cpass"]);


			$errorMsg = "";

			if (empty($firstname)) {
				$firstnameErrorMsg = "First Name is empty <br>";
			}

			if (empty($lastname)) {
				$lastnameErrorMsg = "Last Name is empty <br>";
				
			}

			if (empty($gender)) {
				$genderErrorMsg = "Gender is not selected <br>";
			}

			if (empty($birthday)) {
				$birthdayErrorMsg = "Birthday is empty <br>";
			}

			if (empty($religion)) {
				$religionErrorMsg = "religion is empty <br>";
			}

			if (empty($address)) {
				$addressErrorMsg = "address is empty <br>";
			}

			if (empty($email)) {
				$emailErrorMsg = "email is empty <br>";
			}
			if (empty($uname)) {
				$unameErrorMsg = "username is empty <br>";
			}
			
			else {
				echo $errorMsg;
			}

		}

		else {
			echo "php validation";
		}


            if(isset($_POST["pass"])){
            	$pass = $_POST["pass"];
            	$cpass = $_POST["cpass"];
            	
            	if(empty($pass)) {
				$passErrorMsg = "password is empty <br>";
			     }

			     if (empty($cpass)) {
				$cpassErrorMsg = " Confirm Password is empty <br>";
		         }

		         if ($_POST["pass"] == $_POST["cpass"]) {
                 echo "give a password!";
              }


                  else {
                     echo "did not mathced :(";
                       }		     

            }


              
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate>

		<fieldset>
			<legend> Basic Information</legend>

		<label for="fname">First Name*:</label>
		<input type="text" name="firstname" id="fname">
		<span><?php echo $firstnameErrorMsg; ?></span>

		<br><br>

		<label for="lname">Last Name*:</label>
		<input type="text" name="lastname" id="fname">
		<span><?php echo $lastnameErrorMsg; ?></span>

		<br><br>

		<label for="gen">Gender*:</label>

			<input type="radio" id="male" name="gender" value="male"><label for="male">Male</label>
		
			<input type="radio" id="female" name="gender" value="female"><label for="female">Female</label>
			<input type="radio" id="others" name="gender" value="others"><label for="others">Others</label>

			


			<br><br>

			<label for="birthday">Birthday*:</label>
            <input type="date" id="birthday" name="birthday">
            <span><?php echo $birthdayErrorMsg; ?></span>


			<br><br>

			<label for="religion">Religion*:</label>
			<select name="religion" id="religion">
				<option value=""></option>
				<option value="muslim">MUSLIM</option>
				<option value="hindu">HINDU</option>
				<option value="bodhu">BODHU</option>
				<option value="christianity">CHRISTAN</option>
			</select>
			<span><?php echo $religionErrorMsg; ?></span>

		</fieldset>
		<br><br>



		<fieldset>
			<legend> Contact Information</legend>

			<label for="address">Present Address*:</label>
			<textarea name="address" id="address" placeholder="Write your address please" rows="1" cols="30"></textarea>
			<span><?php echo $addressErrorMsg; ?></span>

			<br><br>

			

			<label for="des">Tell me something about yourself:</label>
			<textarea name="description" id="des" placeholder=" write something within 250 characters"></textarea>

			<br><br>
			<label for="phone">Enter a phone number:</label>
            <input type="tel" id="phone" name="phone" placeholder="01*********" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>

            <br><br>

            <label for="email">Enter your email*:</label>
            <input type="email" id="email" name="email"  pattern=".+@globex\.com" size="30" required>
           
            <span><?php echo $emailErrorMsg; ?></span>

            <br><br>
            <a href="https://www.facebook.com/profile.php?id=100003405692623" target="_blank">click here</a> to visite facebook)
         </fieldset>
         <br><br>



         <fieldset>
			<legend> Group Credentials:</legend>
			<br><br>
			<label for="username">Username*:</label>
            <input type="text" name="uname" id="username">(max 5 characters)
            <span><?php echo $unameErrorMsg; ?></span>

            
             <br><br>

                <label for="password">Password*:</label>
                <input type="password" name="pass" id="password">
               <span><?php echo $passErrorMsg; ?></span>

               <br><br>


               <label for="password">Confirm Password*:</label>
                <input type="password" name="cpass" id="conpassword">
               <span><?php echo $cpassErrorMsg; ?></span>
			</fieldset>
		<br><br>
		<input type="submit">
	</form>

</body>
</html>