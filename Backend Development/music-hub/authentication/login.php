<?php

include("../dbconfig.php");

$errormsg = "";

if(isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

  if($email!='' || $pwd!='') {
    $sql_query = "SELECT count(*) AS usercount FROM users WHERE email='$email';";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['usercount'];
    if($count==1) {
      $sql_query = "SELECT name,email,id,password as hash FROM users WHERE email='$email';";
      $result = mysqli_query($conn, $sql_query);
      $data = mysqli_fetch_array($result);
      if(password_verify($pwd, $data['hash'])==true) {
        $_SESSION['username'] = $data['name'];
        $_SESSION['userid'] = $data['id'];
        $_SESSION['useremail'] = $data['email'];
        header("Location:../index.php");
      }
      else {
        $errormsg ="Email address or password not entered";
      }
    }
    else {
      $errormsg = "Account does not exist. Please register!";
    }
  }
  else {
    $errormsg = "Email address or password not entered";
  }
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple Login Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link rel="stylesheet" href="./../assets/css/authstyles.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="form">
  <form method="post" action=""> 
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="email" placeholder="Email" name="email" autocomplete="nope">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" name="pwd" cautocomplete="new-password">
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
<!-- partial -->
  <script>
    /*

inspiration: 
https://dribbble.com/shots/2292415-Daily-UI-001-Day-001-Sign-Up

*/

let form = document.querySelecter('form');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  return false;
});
  </script>

</body>
</html>