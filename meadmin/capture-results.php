
<?php 
include './validate/db_con.php';

 if(isset($_POST['grade_get'])){
  $search_id=$_POST['grade'];


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
			<form method="post"> 
				<div class="form-group" > <div class="col-sm-9" style="display:flex;" > 
						<div class="col-sm-6"> <input  type="text" class="form-control"style="padding:10px; width:50%;  border-radius:.5rem" value="Please select Grade first to continue..." readonly> </div>
                   
				<select class="form-control" style="padding:10px; width:50%; border-radius:.5rem; margin-left:5rem;" name="grade" id="std_class" onchange="getdata()"> 
					      <option value=" ">Select student class</option>
						  <?php
						     $gr_fetch=$ravi->grade($grade);
							 while($grade_fetch = $gr_fetch->fetch_assoc()){

						  ?>
						  <option value="<?php echo $grade_fetch['grade_id'];?>"><?php echo $grade_fetch['grade_name'];?></option>						  
						  <?php  } ?>
						</select>

						
					</div>
					</div> <input class="btn btn-primary" name="grade_get" type="submit" value="Get Class"></input> <div class="spinner-border"></div></div>
					
				</form>



			<div class="form-body">
				<form class="form-horizontal" method="post" action="./validate/results-add.php">

				 <div class="form-group" style="margin-top:1rem;"> <label for="depart_id" class="col-sm-2 control-label">student Id</label>
				   <select class="form-control" style="padding:10px; width:50%; margin-left:5rem;" name="studentid" id ="studeId" onchange="updateName(this.value)"> 
					      <option value="">Select Student Id ...</option>
						  <?php
						    $get_student=$ravi->student_get($search_id);
							 while($student_fetch = $get_student->fetch_assoc()){

						  ?>
						  <option value="<?php echo $student_fetch['student_no'];?>"><?php echo $student_fetch['student_no'];?></option>						  
						  <?php  } ?>
					</select>
                   </div>

				   <div class="form-group"> <label for="depart_name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-9"> <input  type="text" class="form-control" id="student_name" name="name" value=""> </div>
                   </div>

				   <div class="form-group"> <label for="depart_name" class="col-sm-2 control-label">Grade</label>
				   
						<div class="col-sm-9"> <input value="<?php echo $search_id ?>"  type="text" class="form-control" name="stdgrade" readonly> </div>
						
                   </div>
					<div class="form-group" style="margin-top:1rem;"> <label for="depart_id" class="col-sm-2 control-label">Term</label>
					<select class="form-control" style="padding:10px; width:50%; margin-left:5rem;" name="term" id ="term"> 
					      <option value="">Select Term</option> 
						  <option value="One">Term I</option>
						  <option value="Two">Term II</option>	
						  <option value="Three">Term III</option>							  
					</select>
                   </div>
				   <div class="form-group"> <label for="depart_name" class="col-sm-2 control-label">Maths</label>
						<div class="col-sm-9"> <input  type="text" class="form-control" id="mt" name="maths" placeholder="Enter Maths score ..."> </div>
                   </div>
				   <div class="form-group"> <label for="depart_name" class="col-sm-2 control-label">English</label>
						<div class="col-sm-9"> <input  type="text" class="form-control" id="en" name="eng" placeholder="Enter English score ..."> </div>
                   </div>
				   <div class="form-group"> <label for="depart_name" class="col-sm-2 control-label">Kiswahili</label>
						<div class="col-sm-9"> <input  type="text" class="form-control" id="ki" name="kis" placeholder="Enter Kiswahili score ..."> </div>
                   </div>
				   <div class="form-group"> <label for="depart_name" class="col-sm-2 control-label">Science</label>
						<div class="col-sm-9"> <input  type="text" class="form-control" id="sc" name="sci" placeholder="Enter Science score ..."> </div>
                   </div>
				   <div class="form-group"> <label for="depart_name" class="col-sm-2 control-label">Social Studies</label>
						<div class="col-sm-9"> <input  type="text" class="form-control" id="ss" name="sst" placeholder="Enter SST score ..."> </div>
                   </div>
				   <div class="form-group"> <label for="depart_name" class="col-sm-2 control-label">Teacher remark</label>
						<div class="col-sm-9"> 
						<textarea placeholder="Enter teachers remark..." id="rm" name="remark" rows="4" cols="50" class="form-control" ></textarea>
						
                   </div>
				    
					
				
					<div class="col-sm-offset-2"> 
						<input type="submit" class="btn btn-primary" style="background-color:green" name="addscore" value ="Add Student Score">
						
				</form>
			</div>
			<script type="text/javascript">
                function updateName(id){
					
					$('#student_name').html('');
					$.ajax({
						type:'post',
						url:'studentname.php',
						data:{student_id:id },
						success: function(data){
							$('#student_name').val(data);
						}
					})
				}
		
				</script>

	