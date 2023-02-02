<?php

include './../dbconfig.php';

$errormsg = "";

if(isset($_POST['submit'])) {
  $opwd = mysqli_real_escape_string($conn,$_POST['opwd']);
  $npwd = mysqli_real_escape_string($conn,$_POST['npwd']);
  $cnpwd = mysqli_real_escape_string($conn,$_POST['cnpwd']);
  $email = mysqli_real_escape_string($conn,$_SESSION['useremail']);

  if($pwd!='' || $npwd!='' || $cnpwd!='') {
    if($npwd===$cnpwd) {
      $sql_query = "SELECT count(*) AS usercount FROM users WHERE email='$email' AND password='$opwd';";
      $result = mysqli_query($conn, $sql_query);
      $row = mysqli_fetch_array($result);
      if($row['usercount']>0) {
        $sql_query = "UPDATE users SET password='$npwd' WHERE email='$email';";
        $result = mysqli_query($conn, $sql_query);
        if($result) {
          header("Location:login.php");
        }
        else {
          $errormsg = "Password could not be changed";
        }
      }
      else {
        $errormsg = "Old password did not match. Please try again!";
      }
    }
    else {
      $errormsg = "New passwords entered did not match";
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
    <h1>Change Password</h1>
    <div class="content">
      <div class="input-field">
        <input type="password" placeholder="Old Password" name="opwd">
      </div>
      <div class="input-field">
        <input type="password" placeholder="New Password" name="npwd">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Confirm New Password" name="cnpwd">
      </div>
      <p class="error"><?php echo $errormsg ?></p>
      <button type="submit" name="submit" value="login" class="link">SUBMIT</button><br>
      <a href="#" class="link">Forgot Your Password?</a>
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