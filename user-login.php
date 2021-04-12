<?php
session_start();
include 'db/db.php';

if(isset($_POST['login'])){

 $email=$_POST['username'];
 $password=$_POST['password'];

 $pass=md5($password);
 $query="SELECT * FROM user WHERE status=1";

 $select=mysqli_query($conn,$query);
 $fetch=mysqli_fetch_assoc($select);

  if($email==$fetch['username'] && $pass==$fetch['password']){
    $_SESSION['logstatus']=$email;
    header('location:homepage.php');
  }
  else{
    $_SESSION['logstatus']=false;
    $_SESSION['mess']='Email or Password not match and not activated';
    header('location:user-login.php');
  }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
   html,body { 
	height: 100%; 
}

.global-container{
	height:100%;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: #f5f5f5;
}

form{
	padding-top: 10px;
	font-size: 14px;
	margin-top: 30px;
}

.card-title{ font-weight:300; }

.btn{
	font-size: 14px;
	margin-top:20px;
}


.login-form{ 
	width:330px;
	margin:20px;
}

.sign-up{
	text-align:center;
	padding:20px 0 0;
}

.alert{
	margin-bottom:-30px;
	font-size: 13px;
	margin-top:20px;
}

    </style>


</head>
<body>


<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Log in to Online Book Store</h3>
		<div class="card-text">
			<!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
            <form action="" method="post">
				<!-- to error: add class "has-danger" -->
				<div class="form-group">
					<label for="exampleInputEmail1">User Name</label>
					<input type="text" placeholder="Username" name="username" value="" class="form-control form-control-sm" >
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<a href="#" style="float:right;font-size:12px;">Forgot password?</a>
					<input type="password" placeholder="password" name="password" value="" class="form-control form-control-sm" >
				</div>
				<button type="submit" name="login" class="btn btn-primary btn-block">Sign in</button>
				
				<div class="sign-up">
					Don't have an account? <a href="user-registration.php">Create One</a>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> 
</body>
</html>