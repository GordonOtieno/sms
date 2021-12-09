<?php
      include "./validate/db_conn.php";
	  include "./validate/functions.php";


	  
	  if (iset($_POST['up_teacher'])){

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
	

	  }



?>
<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="index.html">Home</a></li>
			<li class="active">
				<?php if(isset($_GET['ravi'])){ echo strtoupper($page=$_GET['ravi']); } ?>
			</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h2 class="inner-tittle">
			<?php echo strtoupper($_GET['ravi']); ?>
		</h2>

		<div class="grid-1">
			<div class="form-body">
			<form class="form-horizontal" method="post" >
					<?php if (isset($_GET['error'])) { ?>
					<p class="error"><?php echo $_GET['error']; ?></p>
					<?php } ?>

					<?php if (isset($_GET['success'])) { ?>
					<p class="success"><?php echo $_GET['success']; ?></p>
				<?php } ?>
					<div class="form-group"> <label for="id" class="col-sm-2 control-label">Id Number</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="idno" placeholder="Enter ID no.." required autocomplete=off readonly> </div>
					</div>
					
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Phone no:</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="phone" Placeholder="Enter Phone Number"> </div>

					</div>
	
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">DoB</label>
						<div class="col-sm-9"> <input type="date" class="form-control" name="dob"> </div>
					</div>
				<div class="form-group"> <label for="address" class="col-sm-2 control-label">DoE</label>
						<div class="col-sm-9"> <input type="date" class="form-control" name="doe"> </div>

					</div>

					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Email Address</label>
						<div class="col-sm-9"> <input type="email" class="form-control" name="email" placeholder="Enter Email Address.."> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">UserName</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="username" placeholder="Enter Username.."> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-9"> <input type="Password" class="form-control" name="pass" placeholder="Enter new Password"> </div>

					</div>
					
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Highest Qualification</label>
						<div class="col-sm-9"> <select class="form-control" style="padding:10px" name="qualification"> 
					      <option>Select highest qualification</option>
						  <option value="phd">phd</option>
						  <option value="masters">Masters</option>
						  <option value="degree">Degree</option>
						  <option value="diploma">diploma</option>
						  <option value="certificate">Certificate</option>
						</select> </div>

					</div>
					
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Staff type</label>
						<div class="col-sm-9"> <select class="form-control" style="padding:10px" name="staff_type"> 
					      <option>Select Staff Type</option>
						  <option value="admin">Head Teacher</option>
						  <option value="deputy">Deputy H/T</option>
						  <option value="teacher">Teacher</option>
						  <option value="tp">T/P</option>
						</select>
					</div>
					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Designation</label>
					<div class="col-sm-9"> <select class="form-control" style="padding:10px" name="designation"> 
					      <option>Select Designation</option>
						  <option value="admin">Admin</option>
						  <option value="teacher">Teacher</option>
						</select>
					</div>
					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Department</label>
					<div class="col-sm-9"> <select class="form-control" style="padding:10px" name="department"> 
					      <option>Select department</option>
						  <?php
						     $departments=$ravi->department($department);
							 while($department_fetch = $departments->fetch_assoc()){

						  ?>
						  <option value="<?php echo $department_fetch['department_id'];?>"><?php echo $department_fetch['department_name'];?></option>						  
						  <?php  } ?>
						</select>
					</div>
					</div>

					
					<div class="col-sm-offset-2"> <button type="submit" class="btn btn-default" name="up_teacher">Update Teacher Profile</button> </div>
				</form>
			</div>

		</div>


	</div>