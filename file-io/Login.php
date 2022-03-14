
<!DOCTYPE html>
<html>
    <body>
        <?php

            $username = $password ="";
            $emptyusername = $emptypassword ="";

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Login") {

                if(empty($_POST['uname'])) {                    
                    $emptyusername = "Please Fill up the Username!";
                }

                else if(empty($_POST['password'])) {                    
                    $emptypassword = "Please Fill up the password!";
                }

                else {
                    $username = $_POST['uname'];
                    $password = $_POST['password'];

                    $log_file = fopen("Login.txt", "r");
                    
                    $data = fread($log_file, filesize("Login.txt"));
                    
                    fclose($log_file);
                    
                    $data_filter = explode("\n", $data);
                    
                    for($i = 0; $i< count($data_filter)-1; $i++) {

                        $json_decode = json_decode($data_filter[$i], true);
                        if($json_decode['username'] == $username && $json_decode['password'] == $password) 
                        {
                            session_start();
                            $_SESSION['user'] = $username;
                            header('Location: welcome.php');
                        }
                    }
                    echo "Wrong Password! Please Try Again.";
                }
            }

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Sign Up") {
                header('Location:Registration.php');
            }

        ?>
        
        <h1>Doctor Login </h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <fieldset>
              <legend><h2>Login</h2></legend>
            
                <label for="username">Username:</label>
                <input type="text" name="uname" id="username">
                <?php echo $emptyusername; ?>

                <br><br>

                <label for="parmanent_address">Password:</label>
                <input type="password" name="password" id="password">
                <?php echo $emptypassword; ?>
                
                </fieldset>
                <br>

            <input type="submit" value="Login" name="button">
            
            <br><br>

            <input type="submit" value="Sign Up" name="button"> 

            <br>
            <br>
            <a href="#">forgot password</a>
        </form>
        
    </body>
</html>