<?php session_start();
include('../connect.php');
if(!$_SESSION || !isset($_SESSION['login_user']))
   {
    header("location: index.php");
   }
 if($_GET && isset($_GET['delete'])) {
   
   $sql = "DELETE FROM `routes` WHERE id=".$_GET['delete'];
    $conn->query($sql);
     
 }
 if($_POST && isset($_POST['train_name'])) {
   
   $sql = "INSERT INTO `trains`(`name`) VALUES ('".$_POST['train_name']."')";
     $conn->query($sql);
     
 }

 if($_POST && isset($_POST['s']) && isset($_POST['d']) && isset($_POST['t']) && isset($_POST['time']) && isset($_POST['cost'])) {
   
   $sql = "INSERT INTO `routes`(`s`, `d`, `time`, `cost`, `train`) VALUES ('".$_POST['s']."','".$_POST['d']."','".$_POST['time']."','".$_POST['cost']."','".$_POST['t']."')";
     $conn->query($sql);
     
 }
    ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="rro.css">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />

<style>
.routes{
  width: 100%;
}
.routes td,.routes th{
  padding: 2%;
  color:#fff;
}
h3 {    
    border-bottom-style: solid;   
}
a{
  color:#fff;
}
.right {
    float: right;
    width: 300px;
    border: 3px solid black;
    padding: 10px;}
  .output{
    position: absolute;
    left: 30%;
    top:5%;
    width:40%;
    color:#fff !important;
   // display: none;
  }
  .output2{
    position: absolute;
    left: 70%;
    top:10%;
    width:30%;
    color:#fff !important;
   // display: none;
  }
   
 
  .sub-main-w3{
    color:#fff !important;
  }
  .logout{
    float: right;
    padding: 2%;
  }
</style>
</head>
<body>
<a href="../login.php?user=logout"><img src="https://cdn4.iconfinder.com/data/icons/basic-ui-elements/700/012_power-512.png" width="50px" class="logout"></a>
<div style="width:20%;padding:2%;"  class="sub-main-w3">
<center><b><h1>Welcome <?php echo $_SESSION['login_user']; ?></h1></b></center>
<br>
<form id="kkk" action="" method="post">
<table>
<tr>
<td><label for="destination">Destination</label></td>
  <td><select class="user" name="d" required>
   
    <option>select</option>
    <option value="2">Bhopal</option>
    <option value="1">Indore</option>
    <option value="3">Jabalpur</option>
    <option value="4">Gwalior</option>
    
  </select></td>

</tr>
<tr>
<td><label for="source">Source</label></td>
  <td><select name="s">
    <option>select</option>
    <option value="2">Bhopal</option>
    <option value="1">Indore</option>
    <option value="3">Jabalpur</option>
    <option value="4">Gwalior</option>
  </select>
</td>
</tr>


<tr>
<td><label for="time">Time</label></td>
<td> <input type="number" name="time" style="width:100%">
</td>
</tr>

<tr>
<td><label for="Destination Stations">Cost</label></td>
  <td> <input type="number" class="user" name="cost" style="width:100%"></td>
</tr>

<tr>
<td><label for="source">Train</label></td>
  <td><select name="t">
    <option>select</option>
    <?php 
    $sql = "SELECT * FROM trains";
     $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
          echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }} ?>

  </select>
</td>
</tr>

<tr>
<br><td colspan="2"><center><input type="submit" value=""></center></td></tr>
  </table>
  </form>
</div>
  <div class="output">
   <center><h1>Routes Table</h1></center>
   <?php
echo "<table class='routes'><tr><th>Destination</th><th>Source</th><th>Time</th><th>Cost</th><th>Train Name</th><th>Action</th></tr>";
  $sql = "SELECT * FROM routes";
     $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
          $sql = "SELECT * FROM stations where id=".$row['d'];
          $resultd = $conn->query($sql);
          $d = $resultd->fetch_assoc();

          $sql = "SELECT * FROM stations where id=".$row['s'];
          $resultd = $conn->query($sql);
          $s = $resultd->fetch_assoc();

          $sql = "SELECT * FROM trains where id=".$row['train'];
          $resultd = $conn->query($sql);
          $t = $resultd->fetch_assoc();
          echo "<tr><td>".$d['name']."</td><td>".$s['name']."</td><td>".$row['time']."</td><td>".$row['cost']."</td><td>".$t['name']."</td><td><a href='?delete=".$row['id']."'><img src='https://lh3.googleusercontent.com/G2jzG8a6-GAA4yhxx3XMJfPXsm6_pluyeEWKr9I5swUGF62d2xo_Qg3Kdnu00HAmDQ=w300' width='25px'></a></td></tr>";
        }
         }
     ?>
    </table>
  </div>

    <div class="output2">
   <center><h1>Add Train Name</h1></center>
    <div style=""  class="sub-main-w3">

    <form id="kkk" action="" method="post">
    <input type="text" name="train_name" style="width: 40%;"><br>
    <input type="submit" name="" value="">
    </form>
    </div>
  </div>


</body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
/*$(document).ready(function() {

  $('#kkk').submit(function(e) {
    $('.output').css('display','initial');
    e.preventDefault();
    data = $(this).serialize()
    $.ajax({
           type: "POST",
           url: 'http://localhost/train/logic.php',
           data: {data:data},
           success: function(response){
              console.log(response);
              $(".output").html(response);             
             },
             error: function(response){
                console.log(response);
             }

  });
})

});*/
</script>