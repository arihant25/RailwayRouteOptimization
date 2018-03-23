<?php

include("connect.php");
   
   if($_POST) {
    if ($_POST['Password']==$_POST['REPassword']) {
    
      $myusername = $_POST['Name'];
      $mypassword = $_POST['Password']; 
      
        $sql = "INSERT INTO `logininfo`(`name`, `email`, `password`, `phone`, `user_name`) VALUES ('".$_POST['Name']."','".$_POST['Email']."','".$_POST['Password']."','".$_POST['Contact']."','".$_POST['Username']."')";
     $conn->query($sql);
     
     header("location: login.php");
     session_start();
     $_SESSION['msg'] ="You Are Now Registered User.";
      /*if ($result->num_rows > 0) {
         
        $row = $result->fetch_assoc();
        $_SESSION['login_user'] = $myusername;
        $_SESSION['id'] = $row['id'];
        header("location: journey.php");
         }  */  
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
  .main-content-agile{
    margin:initial !important;
  }
  .header-w3l {
    margin: 40px !important;
}

</style>
</head>

<body>
<!--header-->
	<div class="header-w3l">
		<h1>RAILWAY ROUTE OPTIMIZATION</h1>
    <h4>SignUp</h4>
	</div>
<!--//header-->

<!--main-->
<div class="main-content-agile">
	<div class="sub-main-w3">	
		<form action="#" method="post">
			<input data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-allowing=" " title="Name Should Only have alphabets" placeholder="Name" name="Name" class="user" type="text" required=""><br>
      <input placeholder="Username" name="Username" class="user" type="text" required=""><br>
      <input data-validation="email" placeholder="E-mail" name="Email" class="user" type="text" required=""><br>
			<input pattern="[0-9]{10}" title="10 digit contact number" maxlength="10" placeholder="Contact" name="Contact" class="user" type="text" required=""><br>

      <input  pattern="{4}" title="Must contain at least 4 or more characters" placeholder="Password" name="Password" class="pass" type="password" required=""><br>
      <input  pattern="{4}" title="Must contain at least 4 or more characters" placeholder="Confirm Password"" name="REPassword" class="pass" type="password" required=""><br>

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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
          <script src="http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.js"></script>
          <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.css">
          


          <script>
          //alert('kk');
            $.validate({
              lang: 'en'
            });
            $(document).ready(function () {
    //$('input[title]').qtip();  
    console.log('k'); 
    
});
          </script>