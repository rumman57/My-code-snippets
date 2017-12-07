<?php
include '../lib/Session.php';
Session::checkLogin();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php' ;?>
<?php include '../helpers/Format.php';?>
<?php 
  $db = new Database();
  $fm = new Format();
  $start_from = null;
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
<?php
  
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
  	$email = mysqli_real_escape_string($db->link,$_POST['email']);
  	$password = mysqli_real_escape_string($db->link,$_POST['password']);
  	$query = "SELECT * FROM admin where email = '$email' AND password = '$password'";
  	$result = $db->select($query);
  	if($result)
  	{
  		$value = mysqli_fetch_array($result);
  		$row = mysqli_num_rows($result);
  		if($row>0){
          Session::set('login',true);
          Session::set('userId',$value['id']);
          Session::set('password',$value['password']);
          //header("Location:index.php");
          echo "<script>window.location = 'index.php'</script>";
  		}else{
           echo "<span style='color:crimson;font-size:18px;'>Email Or Password Not Found</span>";
  		}
  	}else{
  		echo "<span style='color:crimson;font-size:18px;'>Email Or Password Not Matched</span>";
  	}
  }



?>


		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="email" placeholder="Email" required="" name="email"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
      <div class="button">
      <a href="#">Forget Password !!!</a>
    </div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>