<?php
     include "./validate/db_conn.php"; 

if (isset($_GET['studentid'])){

$student_id= $_GET['studentid'];

$sql= "DELETE FROM  students where student_no='$student_id'";
$result= mysqli_query($conn, $sql);
if ($result) {
	header("Location: home.php?ravi=student-remove&success= You have parmanently deleted the student from the school!");
 exit();
}else {
header("Location: home.php?ravi=student-information&error=Something went wrong hence could not parmanently delete the student account. Please try again later");
	exit();
}
}
	
?>