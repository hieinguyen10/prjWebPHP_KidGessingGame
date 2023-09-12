<!-- PASSWORD MODIFICATION -->

<!DOCTYPE html>




<html>
    <head>
        <title>passwordModification</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>

        <div class="header">
        <h2>PASSWORD MODIFICATION</h2>
        </div>

        <form method="post" action="passwordModification_action.php">
            
            <div class="details">
            <label>Existing Username</label>
            <input type="text" name="username" >
            </div>
            
            <div class="details">
            <label>New Password</label>
            <input type="password" name="newPassword">
            </div>

            <div class="details">
            <label>Confirm Password</label>
            <input type="password" name="conPassword">
            </div>

            <div class="details">
            <button type="submit" class="btn" name="modify">Modify</button>
            </div>
            <br />
            
            <p>
                For Login
                <a href="login_form.php"><input name="user_login" type="button"class="btn" value= "login"/></a>
                <br/>
               
            </p>
            <p>
                
                <a href="registration_form.php">Create an account ?</a>
                <br/>
               
            </p>
        </form>
        
    </body>
</html>