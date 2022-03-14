<?php
    session_start();
    if (! isset($_SESSION['user'])){
      header("Location:Login.php");
    }
 ?>
<!DOCTYPE html>
<html>
     <body>

     <?php
     $username=$password=$confirmpass=$successMsg="";
     $usernameErr=$passwordErr=$confirmpassErr=$notavailable="";

     if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Confirm") {

      if (empty($_POST['username'])){
        $usernameErr = "Please Fill up the Username!";
      }
      else if (empty($_POST['password'])){
        $passwordErr = "Please Fill up the Password!";
      }
      else if (empty($_POST['confirmpassword'])){
        $confirmpassErr = "Please Fill up the Password!";
      }

          
else {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpass=$_POST['confirmpassword'];

    if ($confirmpass!=$password){
        $confirmpassErr = "Please Check the Password!";
      }
      else{
        $log_file = fopen("Login.txt", "r");
    
        $data = fread($log_file, filesize("Login.txt"));
        
        fclose($log_file);
        
        $data_filter = explode("\n", $data);
    
        for($i = 0; $i< count($data_filter)-1; $i++) {
    
          $json_decode = json_decode($data_filter[$i], true);
    
          if( $json_decode['username'] == $username ) 
            {
              $usertable = array('username' => $username, 'password' => $password);
              $usertable_encoded = json_encode($usertable);
    
              $log_filepath = "Login.txt";
    
              $log_file = fopen($log_filepath, "a");
              fwrite($log_file, "\n".$usertable_encoded);	
              fclose($log_file);
              // $json_decode['password'] = $confirmpass;

              $successMsg="Password successfully changed";   
              header('Location:Login.php');
              break;
            }
            else {  
              $notavailable = "User not available!";
      }
    }
  }
}
}

?>

    <h1>Change Password </h1>
    <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <fieldset>
              <legend><h2">Change Password</h2></legend>   

              <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <?php echo $usernameErr; ?> 
                <?php echo $notavailable; ?>

                <br><br>

              <label for="password">Password   :</label>
                <input type="password" name="password" id="password">
                <?php echo $passwordErr; ?>

                <br><br>

                <label for="Con password">Con Pass :</label>
                <input type="password" name="confirmpassword" id="confirmpassword">
                <?php echo $confirmpassErr; ?>

                <br><br>

                </fieldset>
                <br><br>

              <input type="submit" value="Confirm" name="button">
              <?php echo $successMsg; ?>

              </form>

        
        
    </body>
</html>