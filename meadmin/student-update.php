<?php
include "./validate/db_conn.php";
include "./validate/functions.php";

$student_id=$_GET['studentid'];
if (isset($_POST['update_student'])){
        $std_res = validate($_POST['std_resident']);
        $std_guard = validate($_POST['std_guardian']);
        $g_contact1 = $_POST['contact1'];
        $g_contact2 = $_POST['contact2'];
        $g_email=(strtolower($_POST['email']));
        $std_gender = $_POST['std_gender'];
        $dob = $_POST['dob'];
        $std_grade = $_POST['std_grade'];
        $std_precondition = $_POST['std_precon'];

		$sql= "UPDATE students SET residential_area='$std_res',guardian_name='$std_guard',guardian_contact1=$g_contact1,guardian_contact2=$g_contact2,
		guardian_email='$g_email',gender='$std_gender',dob='$dob',grade_id='$std_grade',pre_condition='$std_precondition' where student_no='$student_id'";
		$result= mysqli_query($conn, $sql);
		if ($result) {
			header("Location: home.php?ravi=student-update&studentid=$student_id&success= Student details updated successfully!");
		exit();
		}else {
			echo "guardian_contact1 :".$g_contact1."</br>";
            echo "guardian_contact2 :".$g_contact2."</br>";	
		header("Location: home.php?ravi=student-update&studentid=$student_id&error=Something went wrong hence could not update student details. Please try again later");
		
		exit();
		}
  	
		// echo "std_residential :".$std_res."</br>";
        // echo "sstd_guardianName".$std_guard."</br>";
        // echo "guardian_contact1 :".$g_contact1."</br>";
        // echo "guardian_contact2 :".$g_contact2."</br>";
        // echo "guardian_email :".$g_email."</br>";
        // echo "std_gender :".$std_gender."</br>";
        // echo "dob :".$dob."</br>";
        // echo "std_grade :".$std_grade."</br>";
        // echo "std_precondition :".$std_precondition."</br>";

}

?>



<div class="forms-main">
	
	<div class="graph-form">
		<div class="validation-form">
			<!---->
			<h2 align="center"><?php echo strtoupper($_GET['ravi']); ?></h2>
			<form method="post">
			  <?php
			    
			       $sql= "SELECT * from students where student_no='$student_id'";
				   $result= mysqli_query($conn, $sql);
				     while($student_data=mysqli_fetch_assoc($result)){
	
			    ?>

				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert" style="border-radius: .5rem;"><?php echo $_GET['error']; ?></div>
					<?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success" role="alert" style="border-radius: .5rem;"><?php echo $_GET['success']; ?></div>
                    <?php } ?>
					
			<div class="col-md-6 form-group1 group-mail">
					<label class="control-label">Admission Number</label>
					<input type="text" value="<?php echo $student_id; ?>" name="std_no" readonly style="border-radius: .6rem;background-color: #f7eff0;"/>
				</div>
				<div class="col-md-6 form-group1 group-mail">
					<?php echo $ErrMsg ?>
					<label class="control-label">Last Name</label>
					<input type="text" value="<?php echo $student_data['l_name']; ?>" name="std_lname" readonly style="border-radius: .6rem; background-color: #f7eff0;">
				</div>
				<div class="col-md-6 form-group1 group-mail">
					<label class="control-label">First Name</label>
					<input type="text" value="<?php echo $student_data['f_name']; ?>" name="std_fname" readonly style="border-radius: .6rem; background-color: #f7eff0;">
				</div>
				<div class="col-md-6 form-group1">
						<label class="control-label">Date of Birth</label>
						<input id ="dob-date" type="date" name="dob" min="2009-01-01" max="2022-12-30" value="<?php echo $student_data['dob']; ?>"/>
			    	</div>
				<div class="col-md-6 form-group2 group-mail">
					<label class="control-label">Pre Condition</label>
					<select name="std_precon">
					<option value=" ">Select PreCondition</option>
					<option value="Asthama">Asthama</option>
					<option value="HIV/AIDS">HIV/AIDS</option>
					<option value="Pneumonia">Pneumonia</option>
					<option value="Disability">Physical Disability</option>
					<option value="None">None</option>
                   </select>
				</div>

			<div class="col-md-6 form-group1">
				<label class="control-label">Residential Area</label>
				<input type="text" value="<?php echo $student_data['residential_area']; ?>" required name="std_resident" />
			</div>
			<div class="col-md-6 form-group2 group-mail">
			<label class="control-label">Grade</label>
			<select name="std_grade" required>
				<option value="GR1">Select Class</option>
				<?php 
				$st_add_class = $ravi->grade($grade);
				while($st_add_class_fetch = $st_add_class->fetch_assoc())
				{
				?>
						<option value="<?php echo $st_add_class_fetch['grade_id']; ?>"><?php echo $st_add_class_fetch['grade_name']; ?></option>
						
				<?php } ?>
			</select>
			</div>	

		<div class="col-md-6 form-group2">
		<label class="control-label">gender</label>
	      <select name="std_gender">
		  <option value="Other">select gender</option>
		  <option value="Male">Male</option>
		  <option value="Female">Female</option>
		  <option value="Other">No disclose</option>
	     </select>
       </div>
	   
		<div class="col-md-6 form-group1">
			<label class="control-label" required >Admision Date</label>
			<input id="adm-date" type="date"  name="std_admdate" min="2015-01-01" max="2022-12-30" value="<?php echo $student_data['admission_date']; ?>"readonly style="border-radius:.6rem; background-color: #f7eff0;"/>
		</div>
	
  <div class="col-md-6 form-group1">
	  <label class="control-label">Guardian Contact1</label>
	  <input id="phone" type="text" value="<?php echo $student_data['guardian_contact1']; ?>" required name="contact1" maxlength="10">
  </div>
  <div class="col-md-6 form-group1">
	  <label class="control-label">Guardian Contact2 (Alternative)</label>
	  <input id="phone2" type="text" value="<?php echo $student_data['guardian_contact2']; ?>" required="" name="contact2" maxlength="10">
  </div>
  <div class="col-md-6 form-group1">
	  <label class="control-label">Guardian Name</label>
	  <input type="text" value="<?php echo $student_data['guardian_name']; ?>" required name="std_guardian">
    </div>
  
  <div class="col-md-6 form-group1 form-laskt">
	  <label class="control-label">Guardian Email address</label>
	  <input type="text" value="<?php echo $student_data['guardian_email']; ?>" name="email">
  </div>
</div>
  
<?php  } ?>

	<div class="clearfix"> </div>
	<div class="col-md-12 form-group button-2">
	<input style="padding:.6rem; border-radius: .5rem" type="submit" class="btn btn-primary" value="Update Student" name="update_student">
	<button  type="reset" class="btn btn-default">Cancel</button>
	</div>
		<div class="clearfix"> </div>
			</form>

			<!---->
		</div>

	</div>
	
</div>

