<?php session_start();
if(!$_SESSION || !isset($_SESSION['login_user']) || !isset($_SESSION['id']))
   {
      //session_destroy();
    header("location: login.php");
   }
    ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="rro.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />


<style>
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
  /*body{
    background-image:url('thumb-1920-347731.jpg');
  }*/
  .output{
    //border:1px solid #444;
    //float: right;
    position: absolute;
    left: 30%;
    top:5%;
    width:50%;
    color:#fff !important;
    display: none;
  }
   .history{
    //border:1px solid #000;
    //float: right;
    position: absolute;
    left: 30%;
    top:50%;
    width:50%;
    color:#fff !important;
    //display: none;
  }
  .history h1{
    font-size: 28px;
margin:2%
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
<a href="index.php?user=logout"><img src="https://cdn4.iconfinder.com/data/icons/basic-ui-elements/700/012_power-512.png" width="50px" class="logout"></a>
<div style="width:20%;padding:2%;"  class="sub-main-w3">
<center><b><h1>Welcome <?php echo $_SESSION['login_user']; ?></h1></b></center>
<!--h3 align="right">Welcome UserName</h3>
<a href="update.html"><h4 align="right">update profile</h4></a>
<a href="homepg.html"><h4 align="right">Logout</h4></a-->
<br>
<form id="kkk">
<table>
<tr>
<td><label for="Source Station">Source Station</label></td>
  <td><select class="user" name="s[]" required>
   
    <option>select</option>
    <option value="2">Bhopal</option>
    <option value="1">Indore</option>
    <option value="3">Jabalpur</option>
    <option value="4">Gwalior</option>
    
  </select></td>

</tr>
<tr>
<td><label for="Intermediate Stations1">Intermediate Station</label></td>
  <td>
  <select name="s[]">
  <option>select</option>
    <option value="2">Bhopal</option>
    <option value="1">Indore</option>
    <option value="3">Jabalpur</option>
    <option value="4">Gwalior</option>
  </select>
</td>
</tr>


<tr>
<td><label for="Intermediate Stations2">Intermediate Station</label></td>
<td>  <select name="s[]">

<option>select</option>
    <option value="2">Bhopal</option>
    <option value="1">Indore</option>
    <option value="3">Jabalpur</option>
    <option value="4">Gwalior</option>
  </select>
</td>
</tr>


<tr>
<td><label for="Destination Stations">Destination Station</label></td>
  <td><select name="s[]" required>
    <option>select</option>
    <option value="2">Bhopal</option>
    <option value="1">Indore</option>
    <option value="3">Jabalpur</option>
    <option value="4">Gwalior</option>
  </select>
</td>
</tr>
<tr><td>&nbsp&nbsp</td></tr>
<tr>
<td><label for="Destination Stations">OPTIMIZATION CRITERIA&nbsp&nbsp</label>
</td><td>
<input type="radio" name="oc" value="cost"> <span style="color:#fff">Cost</span>
<input type="radio" name="oc" value="time"> <span style="color:#fff">Time</span>
</td>
</tr>
<tr>
<br><td colspan="2"><center><input type="submit" value=""></center></td></tr>
  </table>
  </form>
</div>
  <div class="output">
    Result
  </div>
   <div class="history">
   <center><h1>Previous Results</h1></center>
   <?php include('functions.php');
$myid = $_SESSION['id'];  $sql = "SELECT history FROM history WHERE user_id = $myid order by id desc limit 3";
     $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
          $data[] = $row['history'];
        }
         }
         if(isset($data) && !empty($data)){
         foreach ($data as $value) {
          echo $response = get_history($value,$conn);

}} ?>
  </div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
$(document).ready(function() {

  $('#kkk').submit(function(e) {
    $('.output').css('display','initial');
    e.preventDefault();
    console.log('kk22');
     //$("#response").html('<img src="https://frontier.com/img/ajax-loader.gif" width="10%">');
//data = new FormData($('#kkk')[0]);
data = $(this).serialize()
console.log(data);
 $.ajax({
           type: "POST",
           url: 'http://localhost/train/logic.php',
           data: {data:data},
           success: function(response){
              console.log(response);
              $(".output").html(response);
             // $("#response55").html("<span class='alert alert-success'>Subcategories Updated Successfully.</span>");
             },
             error: function(response){
                console.log(response);
             }

  });
})

});
</script>