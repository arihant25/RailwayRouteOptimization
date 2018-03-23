<?php
error_reporting(0);
include("../connect.php");
   session_start();
   if($_GET && isset($_GET['user']) && $_GET['user']=='logout')
   {
      session_destroy();
   }
   if($_POST) {
      $myusername = $_POST['Name'];
      $mypassword = $_POST['Password']; 
      
/*       $sql = "SELECT id FROM logininfo WHERE user_name = '$myusername' and password = '$mypassword'";
     $result = $conn->query($sql);*/
      if ($myusername=='admin' && $mypassword=="admin") {
      		$_SESSION['login_user']='admin';
        	header("location: dashboard.php");

         }else{
            $_SESSION['wrong'] = "Wrong username or password";
         }    
   }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>title</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
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
      <h4>Admin Login</h4>
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
			<input placeholder="Username" name="Name" class="user" type="text" required=""><br>
			<input  placeholder="Password" name="Password" class="pass" type="password" required=""><br>
         <br>
			<input type="submit" value="">
		</form>
	</div>
</div>
<div class="footer">
	
</div>
</body>
</html>
