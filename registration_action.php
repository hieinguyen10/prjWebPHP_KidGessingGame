<?php
    session_start();
    
    if (isset($_POST['register'])) {
    
        $uName= htmlspecialchars($_POST['username']);  
        $pWord= htmlspecialchars($_POST['password']);
        $conPword= htmlspecialchars($_POST['conPassword']);
    
        if ($pWord != $conPword) {
            echo "Password is not matched<br>";
            echo"<a href=\"registration_form.php\"><<< BACK</a>";
        }

        else {
            require 'mylogin.php';
            include ('classConnectDB.php');
                // Instantiate a new object $teacher and set its properties with the data collected
                $curUser = new connectDB($uName, $pWord);
                // Instantiate the method insert() with the object $teacher 
                $curUser->insert();

                echo"<a href=\"registration_form.php\"><<< BACK</a>";
        }
    }

        
        
?>