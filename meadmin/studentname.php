<?php

include "./validate/db_conn.php";
if ($_POST['student_id']){
	$idno=$_POST['student_id'];
	$sql = "SELECT * FROM students WHERE student_no='$idno' ";
		$results = mysqli_query($conn, $sql);
   if($results->num_rows >0){
   while($row = $results->fetch_assoc()){
	   echo $row['f_name'];
   }
   }else{
	   echo'nothin';
   }

}
?>