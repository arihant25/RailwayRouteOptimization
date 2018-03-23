<?php
include("connect.php");
   session_start();
   
   if($_POST) {
      // username and password sent from form 
      echo "kkk";
      $myusername = mysqli_real_escape_string($_POST['Name']);
      $mypassword = mysqli_real_escape_string($_POST['Password']); 
      
      echo $sql = "SELECT id FROM login WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: journey.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Transparent Login Form Responsive Widget Template | Home :: w3layouts</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Transparent Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
include ('connect.php');
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />
<!--web-fonts-->
</head>

<body>
<!--header-->
	<div class="header-w3l">
		<h1> Transparent Login Form</h1>
	</div>
<!--//header-->

<!--main-->
<div class="main-content-agile">
	<div class="sub-main-w3">	
		<form action="#" method="post">
			<input placeholder="Username or E-mail" name="Name" class="user" type="text" required=""><br>
			<input  placeholder="Password" name="Password" class="pass" type="password" required=""><br>
			<input type="submit" value="">
		</form>
	</div>
</div>
<!--//main-->

<!--footer-->
<div class="footer">
	
</div>
<!--//footer-->

</body>
</html>
