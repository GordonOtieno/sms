<?php
     include "./validate/db_conn.php"; 

if (isset($_GET['studentid'])){

$student_id= $_GET['studentid'];

$sql= "UPDATE students set status='inactive' where student_no='$student_id'";
$result= mysqli_query($conn, $sql);
if ($result) {
	header("Location: home.php?ravi=student-information&success=Student account has been deactivated successfully");
 exit();
}else {
header("Location: home.php?ravi=student-information&error=Something went wrong hence could not deactivate account. Please try again letter");
	exit();
}
}
	
?>