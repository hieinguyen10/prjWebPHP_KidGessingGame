<?php include('login_action.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
    <h2>LOGIN</h2>
  </div>
     
  <form method="post" action="login_action.php">
    <div class="details">
        <label>Username</label>
        <input type="text" name="username" >
    </div>
    <div class="details">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="details">
        <button type="submit" class="btn" name="user_login">Login</button>
    </div>
      <br />
    <p>
      For Registration
      <a href="registration_form.php"><input name="registration" type="button"class="btn" value= "Register"/></a>
      <br/>
      <a href="passwordModification_form.php">Forgot password ?</a> 
    </p>
  </form>
</body>
</html>
