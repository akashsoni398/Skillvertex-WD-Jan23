<?php

include './../dbconfig.php';

$errormsg = "";

if(isset($_POST['submit'])) {
  $uname = mysqli_real_escape_string($conn,$_POST['uname']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
  $cpwd = mysqli_real_escape_string($conn,$_POST['cnpwd']);

  if($uname!='' || $email!='' || $pwd!='') {
    if($pwd===$cpwd) {
      $sql_query = "SELECT count(*) AS usercount FROM users WHERE email='$email';";
      $result = mysqli_query($conn, $sql_query);
      $row = mysqli_fetch_array($result);
      if($row['usercount']==0) {
        $crypt = password_hash($pwd, PASSWORD_BCRYPT);
        $sql_query = "INSERT INTO users(name,email,password) VALUES ('$uname','$email','$crypt')";
        $result = mysqli_query($conn, $sql_query);
        if($result) {
          header("Location:login.php");
        }
        else {
          $errormsg = "database error";
        }
      }
      else {
        $errormsg = "Email address is already registered. <br> Login into you account";
      }
    }
    else {
      $errormsg = "Passwords entered did not match";
    }
  }
  else {
    $errormsg = "All fields are mandatory. Please try again!";
  }
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple Login Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link rel='stylesheet' href='./../assets/css/authstyles.css' /> 
 
</head>
<body>
<div class="form">
  <form method="post" action=""> 
    <h1>Register</h1>
    <div class="content">
        <div class="input-field">
            <input type="text" placeholder="Username" name="uname" autocomplete="nope">
        </div>
      <div class="input-field">
        <input type="email" placeholder="Email" name="email" autocomplete="nope">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" name="pwd">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Confirm Password" name="cnpwd">
      </div>
      <p class="error"><?php echo $errormsg ?></p>
      <button type="submit" name="submit" value="login" class="link">SUBMIT</button><br>
      <a href="#" class="link">Forgot Your Password?</a>
    </div>
    <div class="action">
      <button>Register</button>
      <button>Sign in</button>
    </div>
  </form>
</div>
  <script>
    let form = document.querySelecter('form');

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      return false;
    });
  </script>

</body>
</html>