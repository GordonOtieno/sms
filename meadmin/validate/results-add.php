<?php 
include "db_conn.php";
include "functions.php";
if(isset($_POST['addscore'])){
    $student_no=$_POST['studentid'];
    $student_grade=$_POST['stdgrade'];
    $term=$_POST['term'];
    $math_score=$_POST['maths'];
    $eng_score=$_POST['eng'];
    $kis_score=$_POST['kis'];
    $sci_score=$_POST['sci'];
    $sst_score=$_POST['sst'];
    $user="gordon";
    $remarks=$_POST['remark'];
    echo"student_no:". $student_no." <br>";
    echo"student_grade:". $student_grade." <br>";
    echo"student_name:". $stude_name." <br>";
    echo"math_score:". $math_score." <br>";
    echo"eng_score:". $eng_score." <br>";
    echo"kis_score:". $kis_score." <br>";
    echo"sci_score:". $sci_score." <br>";
    echo"sst_score:". $sst_score." <br>";
    echo"created_by:". $user." <br>";
    echo"remarks:". $remarks." <br>";

    
    $sql= "INSERT INTO results (class_id,student_id,term,maths,eng,kis,sci,sst,created_by,created_on,remarks) VALUES('$student_grade','$student_no','$term'
    ,$math_score,$eng_score,$kis_score,$sci_score,$sst_score,'$user','2021-11-03 08:01:11','$remarks')";
       $result= mysqli_query($conn, $sql);

       if ($result) {
        header("Location: ../home.php?ravi=capture-results&success=Account has been created successfully");
     exit();
   }else {
           header("Location: ../home.php?ravi=capture-results&error=unknown error occurred");
        exit();
   }
}



 if(isset($_POST['std_add_now']))
 {

    if(isset($_POST['std_no']) && isset($_POST['std_fname'])&& isset($_POST['std_lname'])&& isset($_POST['std_gender'])&& isset($_POST['std_grade'])&& isset($_POST['std_resident'])&& isset($_POST['std_guardian'])&& isset($_POST['contact1'])){
        $std_number =validate( $_POST['std_no']);
         $std_fname = validate(validateName($_POST['std_fname']));
        $std_lname = validate(validateName($_POST['std_lname']));
        $std_residential = validate($_POST['std_resident']);
        $std_guardianName = validate(validateName($_POST['std_guardian']));
        $guardian_contact1 = $_POST['contact1'];
        $guardian_contact2 = $_POST['contact2'];
        $guardian_email=(strtolower($_POST['email']));
        $std_gender = $_POST['std_gender'];
        $dob = $_POST['dob'];
        $std_grade = $_POST['std_grade'];
        $std_adm_date = $_POST['std_admdate'];
        $std_precondition = $_POST['std_precon'];

        // echo "std no :".$std_number."</br>";
        // echo "std_fname :".$std_fname."</br>";
        // echo "std_lname :".$std_lname."</br>";
        // echo "std_residential :".$std_residential."</br>";
        // echo "sstd_guardianName".$std_guardianName."</br>";
        // echo "guardian_contact1".$guardian_contact1."</br>";
        // echo "guardian_contact2".$guardian_contact2."</br>";
        // echo "guardian_email :".$guardian_email."</br>";
        // echo "std_gender :".$std_gender."</br>";
        // echo "dob :".$dob."</br>";
        // echo "std_grade :".$std_grade."</br>";
        // echo "std_adm_date :".$std_adm_date."</br>";
        // echo "std_precondition :".$std_precondition."</br>";

       
	    $sql = "SELECT * FROM students WHERE student_no='$std_number' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
            header("Location: home.php?ravi=add-student,error=A student with this Number exists ");
            exit();
		}else {
           
           $sql2 = "INSERT INTO students(student_no,f_name,l_name,gender,dob,grade_id,admission_date,pre_condition,residential_area,guardian_name,guardian_contact1,guardian_contact2,guardian_email)
                             VALUES('$std_number','$std_fname','$std_lname','$std_gender','$dob','$std_grade','$std_adm_date','$std_precondition','$std_residential','$std_guardianName','$guardian_contact1','$guardian_contact2','$guardian_email')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../home.php?ravi=add-student&success=Account has been created successfully");
	         exit();
           }else {
	           	header("Location: ../home.php?ravi=add-student&error=unknown error occurred");
		        exit();
           }
		}
   
     }else{
        header("Location: home.php?ravi=add-student&error=Please insert all Fields");
	    exit();
     }
	 
 }
?>