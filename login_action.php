<?php
session_start();


if (isset($_POST['user_login'])) {

    $uName = htmlspecialchars($_POST['username']);
    $passWord = htmlspecialchars($_POST['password']);
        
    require ('classConnectDB.php');

    $conn = new connectDB($uName, $passWord);

    $User = $conn->checkUser();
    

    if (empty($User) || $con->checkUser()===FALSE) {
       
        echo "Wrong Username or Password <br> Please try again <br><br>";
        echo "<a href='login_form.php'><<< Back</a>";
    }

    else {
        require 'game.php';
    }

    
}
  
  
?>