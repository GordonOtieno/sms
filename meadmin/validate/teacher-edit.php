<?php
include "db_conn.php";
include "functions.php";

$teacher_id = htmlspecialchars($_GET["teacherid"]);
if(isset($_POST['up_teacher']))
{
    $teacher_id = htmlspecialchars($_GET["teacherid"]);
    $add_idno = $_POST['idno'];
    $add_phone = $_POST['phone'];
    $add_dob = $_POST['dob'];
    $add_doe = $_POST['doe'];
    $add_email = $_POST['email'];
    $add_username = $_POST['username'];
    $add_password = $_POST['pass'];
    $add_qualification = $_POST['qualification'];
    $add_staff_type = $_POST['staff_type'];
    $add_designation = $_POST['designation'];
    $add_department = $_POST['department'];

    echo "this is staff id".$teacher_id;

    // if ($conn) {
    //     echo "Connection HAS !";
    // }

    // $sql = "SELECT * FROM teaching_staff WHERE staff_id='ST001' ";
    // $result = mysqli_query($conn, $sql);

    // while ($row= mysqli_fetch_assoc($result)){
    //     echo $row['f_name'];
    // }
    
    // if (mysqli_num_rows($result) === 0) {
    //     header("Location: ../home.php?ravi=teacher-editnow&error=No staff exist with the specified id.");
    //     exit();
    // }else {
    //     $sql2="UPDATE `teaching_staff` SET `dob` ='$add_dob',`employment_date`='$add_doe',`email`='$add_email',`username`='$add_username',`pass`='$add_password',`Highest_qualification`='$add_qualification',`phone_no`='$add_phone',`staff_type`='$add_staff_type',`designation`='$add_designation',`departmet`='$add_department' WHERE `teaching_staff`.`staff_id` = '$teacher_id'";
    //      $result2 = mysqli_query($conn, $sql2);
    //    if ($result2) {
    //         header("Location: ../home.php?ravi=teacher-editnow&success=Staff Details updated successfully");
    //      exit();
    //    }else {
    //     header("Location: ../home.php?ravi=teacher-editnow&error=An error has occured. If this persist, please contact your system administrator");
    //         exit();
    //    }
    // }

 }else{
    header("Location: ../home.php?ravi=teacher-editnow&error=Please fill all the fields");
    exit();
 }





?>