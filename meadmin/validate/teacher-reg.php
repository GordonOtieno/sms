<?php
include 'db_conn.php';
include 'functions.php';

 if(isset($_POST['add_teacher_info']))
 {
	
	 $add_idno = $_POST['idno'];
	 $add_fname = $_POST['fname'];
	 $add_lname = $_POST['lname'];
	 $add_phone = $_POST['phone'];
	 $add_tscno = $_POST['tscno'];
	 $add_dob = $_POST['dob'];
	 $add_doe = $_POST['doe'];
	 $add_gender = $_POST['gender'];
	 $add_email = $_POST['email'];
	 $add_username = $_POST['username'];
	 $add_password = $_POST['pass'];
	 $add_qualification = $_POST['qualification'];
	 $add_staff_type = $_POST['staff_type'];
	 $add_designation = $_POST['designation'];
	 $add_department = $_POST['department'];
     
//   if($add_idno1&& $add_ffname&& $add_llname&&$add_tscno1&& $add_email&&$add_department){
// 	$add_idno =validate($add_idno1);
// 	$add_fname= validate($add_ffname);
// 	$add_lname= validate($add_llname);
// 	$add_tscno= validate($add_tscno1);
// 	if(isValidEmail($_POST['email'])){
// 		return $add_email=$_POST['email'];
// 	}else{
// 		header("Location: home.php?ravi=add-student,error=Please enter valid email Address");
//       exit();
// 	}
// }
 


	    // echo "add_idno:".$add_idno."</br>";
        // echo "add_fname :".$add_fname."</br>";
        // echo "add_lname :".$add_lname."</br>";
        // echo "add_phone :".$add_phone."</br>";
        // echo "add_tscno".$add_tscno."</br>";
        // echo "add_dob".$add_dob."</br>";
        // echo "add_doe".$add_doe."</br>";
        // echo "add_gender :".$add_gender."</br>";
        // echo "add_email :".$add_email."</br>";
        // echo "add_username :".$add_username."</br>";
        // echo "add_password :".$add_password."</br>";
        // echo "add_qualification :".$add_qualification."</br>";
        // echo "add_staff_type :".$add_staff_type."</br>";
		// echo "add_designation :".$add_designation."</br>";
        // echo "add_staff_type :".$add_staff_type."</br>";

        $sql = "SELECT * FROM teaching_staff WHERE staff_id='$add_idno' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
            header("Location: ../home.php?ravi=teacher-add&error=User with the same id exist. Please select another User ID");
            exit();
		}else {
           $sql2 = "INSERT INTO teaching_staff(staff_id,f_name,l_name,tsc_no,dob,employment_date,gender,email,username,pass,Highest_qualification,phone_no,staff_type,designation,departmet)
                             VALUES('$add_idno','$add_fname','$add_lname','$add_tscno','$add_dob','$add_doe','$add_gender','$add_email','$add_username','$add_password','$add_qualification','$add_phone','$add_staff_type','$add_designation','$add_department')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../home.php?ravi=teacher-add&success=Your account has been created successfully");
	         exit();
           }else {
			header("Location: ../home.php?ravi=teacher-add&error=An error has occured. If this persist, please contact your system administrator");
		        exit();
           }
		}
   
     }else{
        header("Location: ../home.php?ravi=teacher-add&error=Please fill all the fields");
	    exit();
     }





?>