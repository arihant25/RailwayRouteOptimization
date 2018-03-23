<?php

include("connect.php");
   session_start();
   if($_GET && isset($_GET['user']) && $_GET['user']=='logout')
   {
      session_destroy();
   }
   if($_POST) {
      $myusername = $_POST['Name'];
      $mypassword = $_POST['Password']; 
      
       $sql = "SELECT id FROM logininfo WHERE user_name = '$myusername' and password = '$mypassword'";
     $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         
        $row = $result->fetch_assoc();
        $_SESSION['login_user'] = $myusername;
        $_SESSION['id'] = $row['id'];
        header("location: journey.php");
         }else{
            $_SESSION['wrong'] = "Wrong username or password";
         }    
   }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>title</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />
<!--web-fonts-->
<style type="text/css">
   .regis{
      padding: 1%;
      color: #fff;
      background-color:#4CAF50;
   }
   .wrong{
      padding: 1%;
      color: #fff;
      background-color:#ed5249;
   }
</style>
</head>

<body>
<!--header-->
	<div class="header-w3l">
		<h1>RAILWAY ROUTE OPTIMIZATION</h1>
      <h4>Login</h4>
	</div>
<!--//header-->

<!--main-->
<?php 
if(isset($_SESSION['msg']))
{
   echo "<span class='regis'>".$_SESSION['msg']."</span>";
   session_destroy();
}
if(isset($_SESSION['wrong']))
{
   echo "<span class='wrong'>".$_SESSION['wrong']."</span>";
   session_destroy();
}
 ?>
<div class="main-content-agile" >

	<div class="sub-main-w3">	
		<form action="#" method="post">
			<input placeholder="Username or E-mail" name="Name" class="user" type="text" required=""><br>
			<input  placeholder="Password" name="Password" class="pass" type="password" required=""><br>
         <a href="admin/" style="color:#fff;position: relative;right:5%;">Admin Login</a>
         <a href="signup" style="color:#fff;position: relative;right:-5%">New User?</a><br>
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
