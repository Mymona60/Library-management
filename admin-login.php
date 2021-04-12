<?php
session_start();
include 'db/db.php';

if(isset($_POST['check'])){

 $email=$_POST['username'];
 $password=$_POST['password'];

 $pass=md5($password);
 $query="SELECT * FROM admin WHERE status=1";

 $select=mysqli_query($conn,$query);
 $fetch=mysqli_fetch_assoc($select);

  if($email==$fetch['username'] && $pass==$fetch['password']){
    $_SESSION['logstatus']=$email;
    header('location:dashboard.php');
  }
  else{
    $_SESSION['logstatus']=false;
    $_SESSION['mess']='Email or Password not match and not activated';
    header('location:admin-login.php');
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
  <head>
   <body style="background:url(css/12778.jpeg);">
     <div class="login-box">
       <h1>Login</h1>

      <form action="" method="post">
             <div class="textbox">
              <i class="fa fa-user" aria-hidden="true"></i>
               <input type="text" placeholder="Username" name="username" value="">
             </div>

             <div class="textbox">
              <i class="fa fa-lock" aria-hidden="true"></i>
              <input type="password" placeholder="password" name="password" value="">
            </div>
            <input class="btn " type="submit" name="check" value="sign in" style="width: 120px; background: #fff; color:#000; border:none">     
      </form>

    </div>
   </body>
</html>