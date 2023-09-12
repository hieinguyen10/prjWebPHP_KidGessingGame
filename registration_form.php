<!-- REGISTRATION -->

<!DOCTYPE html>




<html>
    <head>
        <title>registration</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>

        <div class="header">
        <h2>REGISTRATION</h2>
        </div>

        <form method="post" action="registration_action.php">
            
            <div class="details">
            <label>Username</label>
            <input type="text" name="username" >
            </div>
            
            <div class="details">
            <label>Password</label>
            <input type="password" name="password">
            </div>

            <div class="details">
            <label>Confirm Password</label>
            <input type="password" name="conPassword">
            </div>

            <div class="details">
            <button type="submit" class="btn" name="register">Register</button>
            </div>
            <br />
            
            <p>
                For Login
                <a href="login_form.php"><input name="user_login" type="button"class="btn" value= "login"/></a>
                <br/>
               
            </p>
        </form>
        
    </body>
</html>