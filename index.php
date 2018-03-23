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
   .main-content-agile{
    color:#fff;
    text-align: justify;
    padding: 2%;
    margin:initial;
   }
   ul{
    list-style-type: disc !important;
   }
   .logout{
    float: right;
    padding: 2%;
    color:#fff;
  }
</style>
</head>

<body>
<a href="login.php" class="logout">Login</a>
<!--header-->
	<div class="header-w3l">
		<h1>RAILWAY ROUTE OPTIMIZATION</h1>
      <h4>Intro</h4>
	</div>
<!--//header-->

<!--main-->

<div class="main-content-agile" >
The railway system is a complex system. The operations performed by the railway system are more confusing. The requirement of railway operations is to meet the demand assigned to railways through the optimization of usage of the railway transportation specific resources. So optimization algorithms or techniques form the basis, especially in the era when information technologies prevail, of modern railway operation, in which the most typical cases are, not limited to Railway management information systems design.

Railway Route Optimization System is a product to serve to users who are tourists. The objective of this project is to give the end users or passengers to know the shortest path to reach the destination with in short period and with amount as minimum as possible and as early as possible when more than one Railway route is to there to reach the destination. The output for this optimization system shows in graphical form of the train route from source point to destination point. Nowadays it is very useful to know about the train details i.e. train Source Point and Destination Point. 
There are four modules are used for optimization. 
<br>
<ul>
<li>Station</li>
<li>Route</li>
<li>Points</li>
<li>Trains</li>  
</ul>
Railway Route Optimization System is developed to help many passengers or tourist to know the Shortest Path for their requested route this is the main purpose of our system. You can find the shortest path of a train route by manually but there may be problems that have to be faced so to overcome such problems we need to take the help from Optimization Techniques to know the shortest path. Lot of time is required to retrieve the details of train, station and routes manually. Even single information for a train or route from starting point to ending point will take lot of time problem statement. 

</div>
<!--//main-->

<!--footer-->
<div class="footer">
	
</div>
<!--//footer-->

</body>
</html>
