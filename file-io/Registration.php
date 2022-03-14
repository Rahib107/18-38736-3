
<!DOCTYPE html>
<html>
    
    <body>
        <?php

            $presentaddress=  $email = $phone =  $username = $password = $rec_email = $successmsg ="";

            $emptypresentaddress = $emptyemail = $emptyphone = $emptyusername = $emptypassword = $emptyrec_email = $notavailable ="";



            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['username'])) {
                      $emptyusername = "Please Fill up the Name!";
                }

                else if(empty($_POST['presentaddress'])) {
                   $emptypresentaddress = "Please Fill up the Present Address!";
                }

                else if(empty($_POST['email'])) {                    
                   $emptyemail = "Please Fill up the Email!";
                    
                }

                else if(empty($_POST['phone'])) {                    
                 $emptyphone = "Please Fill up the Phone!";
                }


                 else if(empty($_POST['username'])) {                    
                   $emptyusername  = "Please Fill up the username!";
                }


                else if(empty($_POST['password'])) {                    
                   $emptypassword = "Please Fill up the password!";
                }

                else if(empty($_POST['rec_email'])) {                    
                   $emptyrec_email = "Please Fill up the recovery email!";
                }

                else {
                    $presentadress = $_POST['presentaddress'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $rec_email = $_POST['rec_email'];                    

                    $log_file = fopen("Login.txt", "r");
                    
                    $data = fread($log_file, filesize("Login.txt"));
                    
                    fclose($log_file);
                    
                    $data_filter = explode("\n", $data);

                    for($i = 0; $i< count($data_filter)-1; $i++) {

                        $json_decode = json_decode($data_filter[$i], true);

                        if( $json_decode['username'] == $username ) 
                        {
                            $notavailable = "This username is not available to use!";
                        }
                        else {  
                            $details = array('presentadress' => $presentadress,'email' =>  $email, 'phone' => $phone,'username' => $username, 'password' => $password, 'rec_email' => $rec_email);

                            $details_encoded = json_encode($details);

                            $filepath = "Registration.txt";

                            $reg_file = fopen($filepath, "a");
                            fwrite($reg_file, $details_encoded . "\n");	
                            fclose($reg_file);

                            $usertable = array('username' => $username, 'password' => $password);
                            $usertable_encoded = json_encode($usertable);

                            $log_filepath = "Login.txt";

                            $log_file = fopen($log_filepath, "a");
                            fwrite($log_file, "\n".$usertable_encoded);	
                            fclose($log_file);

                            $successmsg="Registration successful";
                            header('Location:Login.php');
                            break;
                            }
                        }
                    }
            }
        ?>



        <h1>Doctor Registration Form</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" novalidate>
            <fieldset>
      
            <legend><h2>Contact Information</h2></legend>

            <label for="presentaddress">Present address:</label>
            <input type="text" id="presentadress" name="presentaddress">

            <?php echo $emptypresentaddress; ?>

            <br><br>

            <label for="phone">Phone number:</label>
            <input type="tel" id="phone" name="phone">


            <br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <?php echo $emptyemail; ?>

           <br><br>


          </fieldset>





               <fieldset>
                    
             <legend> <h2>LogIn Information</h2></legend>

                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <?php echo $emptyusername; echo $notavailable; ?>

                <?php echo $emptyusername; ?>


                <br><br>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <?php echo $emptypassword; ?>

                <br><br>

                <label for="rec_email">Recovery email:</label>
                <input type="email" id="rec_email" name="rec_email">
                <?php echo $emptyrec_email; ?>
                
                </fieldset>
                <br><br>

            <input type="submit" value="Register" > 
            <?php echo $successmsg; ?>
        </form>
        
    </body>
</html>