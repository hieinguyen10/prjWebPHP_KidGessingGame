<?php
session_start();


if (isset($_POST['modify'])) {

    $uName = htmlspecialchars($_POST['username']);
    $passWord = htmlspecialchars($_POST['newPassword']);
    $conPassword = htmlspecialchars($_POST['conPassword']);

    if($passWord === $conPassword) {

        require 'mylogin.php';
        require ('classConnectDB.php');

        $conn = new connectDB($uName, $passWord);

        
        
        $state = $conn->checkUserbyName();
            
            if ($state === FALSE) {
                echo "The username doesn't exists";
            }
            else{
                $conn = new connectDB($uName,  $passWord);
                $conn->updateToTb($passWord);
                echo "Successful Modified";
            }

        
    }
    else {
        echo "Password and Password Confirm is not the same!";
    }

    echo "<link rel='stylesheet' type='text/css' href='styles.css'>
        <p>
        For Login
        <a href='login_form.php'><input name='registration' type='button'class='btn' value= 'Login'/></a><br>";
    echo "<a href='passwordModification_form.php'><<< Back</a>";
    
    
}