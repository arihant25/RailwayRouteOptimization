<style type="text/css">

	.result_data table{
		color:#fff !important;
	width:100% !important;
	
}
	.result_data th{
		color: #999;
	}
	.result_data td{
		text-align: center;
		padding: 2% !important;
		color:#fff !important;
	}

</style>
<?php 
include ('connect.php');
session_start();

 parse_str($_POST['data'],$data);

//print_r($data);
foreach ($data['s'] as $value) {
			if($value!='select')
			{
				$new_a[] = $value;
			}

		}
		if(empty($new_a) || count($new_a)==1)
{
	echo "Please Provide Correct Input.";
	die;
}
 if(!isset($data['oc']))
 {
 	echo "Please Select 'OPTIMIZATION CRITERIA' ";
 	die;
 }
$nodes = implode(',', $new_a);

 $count = count($new_a);

     $sql = "INSERT INTO `history`(`user_id`, `history`) VALUES (".$_SESSION['id'].",'".$nodes."-".$data['oc']."')";
     $conn->query($sql);


if($count==4)
{
	foreach ($new_a as $value) {
			$a1[] = $value;
		}
		
echo "<div class='result_data'><table>
<tr><th>Train Name</th><th>Cost</th><th>Time (in hours)</th></tr>";

		 $sql = "SELECT * FROM routes where (s=".$a1[0]." and d=".$a1[1].") or (d=".$a1[0]." and s=".$a1[1].") order by ".$data['oc']." asc";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			   $row = $result->fetch_assoc();
			      $sql_t = "SELECT * FROM trains where id=".$row['train'];
				$result_t = $conn->query($sql_t);
				$row_t = $result_t->fetch_assoc();

		     echo "<tr><td>".$row_t['name']."</td><td>".$row['cost']."</td><td>".$row['time']."</td></tr>";
			    
			}
		
		 $sql = "SELECT * FROM routes where (s=".$a1[1]." and d=".$a1[2].") or (d=".$a1[1]." and s=".$a1[2].") order by ".$data['oc']." asc";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			
			$row = $result->fetch_assoc();
		   // while($row = $result->fetch_assoc()) {
		    	 $sql_t = "SELECT * FROM trains where id=".$row['train'];
				$result_t = $conn->query($sql_t);
				$row_t = $result_t->fetch_assoc();

		     echo "<tr><td>".$row_t['name']."</td><td>".$row['cost']."</td><td>".$row['time']."</td></tr>";
		     //print_r($row);
		    //}
		   
		}
		//
		  $sql = "SELECT * FROM routes where (s=".$a1[2]." and d=".$a1[3].") or (d=".$a1[2]." and s=".$a1[3].") order by ".$data['oc']." asc";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			//echo "<div class='result_data'><table>";
			$row = $result->fetch_assoc();
		    //while($row = $result->fetch_assoc()) {
		    	 $sql_t = "SELECT * FROM trains where id=".$row['train'];
				$result_t = $conn->query($sql_t);
				$row_t = $result_t->fetch_assoc();

		     echo "<tr><td>".$row_t['name']."</td><td>".$row['cost']."</td><td>".$row['time']."</td></tr>";
		     //print_r($row);
		   // }
		    
		} 
		echo "</table></div>";
}else if($count==3)
{
		foreach ($new_a as $value) {
			$a1[] = $value;
		}
		
		 $sql = "SELECT * FROM routes where (s=".$a1[0]." and d=".$a1[1].") or (d=".$a1[0]." and s=".$a1[1].") order by ".$data['oc']." asc";
		 echo "<div class='result_data'><table><tr><th>Train Name</th><th>Cost</th><th>Time (in hours)</th></tr>";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			
			$row = $result->fetch_assoc();
		   // while($row = $result->fetch_assoc()) {
		    	 $sql_t = "SELECT * FROM trains where id=".$row['train'];
				$result_t = $conn->query($sql_t);
				$row_t = $result_t->fetch_assoc();

		     echo "<tr><td>".$row_t['name']."</td><td>".$row['cost']."</td><td>".$row['time']."</td></tr>";
		     //print_r($row);
		    //}
		   
		} else {
		    //echo "0 results4";
		}

		//
		 $sql = "SELECT * FROM routes where (s=".$a1[1]." and d=".$a1[2].") or (d=".$a1[1]." and s=".$a1[2].") order by ".$data['oc']." asc";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			
			$row = $result->fetch_assoc();
		    //while($row = $result->fetch_assoc()) {
		    	 $sql_t = "SELECT * FROM trains where id=".$row['train'];
				$result_t = $conn->query($sql_t);
				$row_t = $result_t->fetch_assoc();

		     echo "<tr><td>".$row_t['name']."</td><td>".$row['cost']."</td><td>".$row['time']."</td></tr>";
		     //print_r($row);
		   // }
		    
		} else {
		    echo "0 results";
		}
		echo "</table></div>";
		//
}else if($count==2)
{
		foreach ($new_a as $value) {
			$a1[] = $value;
		}
		
$sql = "SELECT * FROM routes where (s=".$a1[0]." and d=".$a1[1].") or (d=".$a1[0]." and s=".$a1[1].") order by ".$data['oc']."  asc";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<div class='result_data'><table>
				  <tr><th>Train Name</th><th>Cost</th><th>Time (in hours)</th></tr>";
		    while($row = $result->fetch_assoc()) {
		    	 $sql_t = "SELECT * FROM trains where id=".$row['train'];
				$result_t = $conn->query($sql_t);
				$row_t = $result_t->fetch_assoc();

		     echo "<tr><td>".$row_t['name']."</td><td>".$row['cost']."</td><td>".$row['time']."</td></tr>";
		     //print_r($row);
		    }
		    echo "</table></div>";
		} else {
		    echo "0 results5";
		}
}


?>