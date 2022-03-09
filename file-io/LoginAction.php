<?php
session_start();
$detail = file_get_contents('user.json');
    $detailok = json_decode($detail);

    $isValid= false;

    foreach($detailok as $ok)
    {
        $username=$ok->username;
        $password=$ok->password;
    }



if (isset($_POST['username'])) {
    if ($_POST['username']==$username && $_POST['password']==$password)
    {
        $_SESSION['username'] = $username;

        header("welcome.php");
    }
    else{
        $msg="username or password invalid";
        
    }

}

?>