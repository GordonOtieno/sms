

<div class="forms-main">
	
	<div class="graph-form">
		<div class="validation-form">
			<!---->
			<h2 align="center"><?php echo strtoupper($_GET['ravi']); ?></h2>
			<form method="post" action="./validate/student-reg.php">
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert" style="border-radius: .5rem;"><?php echo $_GET['error']; ?></div>
					<?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success" role="alert" style="border-radius: .5rem;"><?php echo $_GET['success']; ?></div>
                    <?php } ?>
					
			<div class="col-md-6 form-group1 group-mail">
					<label class="control-label">Admission Number</label>
					<input type="text" placeholder="Enter Admission no..." required="" name="std_no" required autocomplete=off>
				</div>
				<div class="col-md-6 form-group1 group-mail">
					<?php echo $ErrMsg ?>
					<label class="control-label">Last Name</label>
					<input type="text" placeholder="Last Name" required name="std_lname">
				</div>
				<div class="col-md-6 form-group1 group-mail">
					<label class="control-label">First Name</label>
					<input type="text" placeholder="First Name" required name="std_fname">
				</div>
				<div class="col-md-6 form-group1">
						<label class="control-label">Date of Birth</label>
						<input id ="dob-date" type="date" name="dob" min="2009-01-01" max="2022-12-30" />
			    	</div>
				<div class="col-md-6 form-group2 group-mail">
					<label class="control-label">Pre Condition</label>
					<select name="std_precon">
					<option value=" ">Select PreCondition</option>
					<option value="Asthama">Asthama</option>
					<option value="Asthama">HIV/AIDS</option>
					<option value="Asthama">Pneumonia</option>
					<option value="None">None</option>
                   </select>
				</div>

			<div class="col-md-6 form-group1">
				<label class="control-label">Residential Area</label>
				<input type="text" placeholder="resident" required name="std_resident" />
			</div>
			<div class="col-md-6 form-group2 group-mail">
			<label class="control-label">Grade</label>
			<select name="std_grade" required>
				<option>Select Class</option>
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
		  <option value="">select gender</option>
		  <option value="Male">Male</option>
		  <option value="Female">Female</option>
		  <option value="other">No disclose</option>
	     </select>
       </div>
	   
		<div class="col-md-6 form-group1">
			<label class="control-label" required >Admision Date</label>
			<input id="adm-date" type="date"  name="std_admdate" min="2015-01-01" max="2022-12-30" />
		</div>
	
  <div class="col-md-6 form-group1">
	  <label class="control-label">Guardian Contact1</label>
	  <input id="phone" type="text" placeholder="First Contact" required name="contact1" maxlength="10">
  </div>
  <div class="col-md-6 form-group1">
	  <label class="control-label">Guardian Contact2 (Alternative)</label>
	  <input id="phone2" type="text" placeholder="Alternative contact" required="" name="contact2" maxlength="10">
  </div>
  <div class="col-md-6 form-group1">
	  <label class="control-label">Guardian Name</label>
	  <input type="text" placeholder="Guardian Name" required name="std_guardian">
    </div>
  
  <div class="col-md-6 form-group1 form-laskt">
	  <label class="control-label">Guardian Email address</label>
	  <input type="text" placeholder="Email Address" name="email">
  </div>
</div>
  
	<div class="clearfix"> </div>
	<div class="col-md-12 form-group button-2">
	<input style="padding:.6rem; border-radius: .5rem" type="submit" class="btn btn-primary" value="Add Student" name="std_add_now">
	<button  type="reset" class="btn btn-default">Reset</button>
	</div>
		<div class="clearfix"> </div>
			</form>

			<!---->
		</div>

	</div>
	
</div>

