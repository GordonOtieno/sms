
<?php 
include './validate/db_con.php';

 if(isset($_POST['update']))
 {
	 $dept_id= $_POST['dept_id'];
	 $dept_name= $_POST['dept_name'];
	 $dept_head= $_POST['dept_head'];

	       // echo "id :".$dept_id. "</br>";
			// echo "dept name :".$dept_name. "</br>";
			// echo "dept head :".$dept_head. "</br>";
			
			// $conn = OpenCon();
			// echo "Connected Successfully";
			// CloseCon($conn);
  $sqlquery= "UPDATE departments set department_name='$dept_name', department_head='$dept_head' where department_id= '$dept_id'";
  if(mysqli_query($conn, $sqlquery)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sqlquery. " . mysqli_error($conn);
}

	//  if($dept_id="" or $dept_name="" or $dept_head=""){
	// 	echo "<script>alert('Please fill all the fields ..');</script>";
	//  }else{
	// 	$add_done = $ravi->add_department($dept_id,$dept_name,$dept_head);
	// 	if($add_done==true)
	// 	{
	// 		echo "<script>window.location='home.php?teacher=teacher-information';</script>";
	// 		echo "id :".$dept_id. "</br>";
	// 		echo "dept name :".$dept_name. "</br>";
	// 		echo "dept head :".$dept_head. "</br>";
	// 	}
	// 	else
	// 	{
	// 		echo "id :".$dept_id. "</br>";
	// 		echo "dept name :".$dept_name. "</br>";
	// 		echo "dept head :".$dept_head. "</br>";
	// 		echo "<script>alert('Department not created');</script>";
			
	// 	}
	//  }
 }
  //Edit department
 if(isset($_POST['dept_get'])){
  $search_id=$_POST['search'];
 
  $get_department=$ravi->get_department($search_id);
 
  
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
			<form method="post"> <div class="form-group" > <div class="col-sm-9"> <select class="form-control" style="padding:10px" name="search"> 
					      <option value=" ">Select department to Edit </option>
						  <?php
						     $dept_fetch=$ravi->get_departments();
							 while($department_fetch = $dept_fetch->fetch_assoc()){

						  ?>
						  <option value="<?php echo $department_fetch['department_id'];?>"><?php echo $department_fetch['department_name'];?></option>						  
						  <?php  } ?>
						</select>
					</div>
					</div> <input class="btn btn-primary" name="dept_get" type="submit" value="Get department"></input> </div></form>
			<div class="form-body">
				<form class="form-horizontal" method="post">
					<?php
					  while($dept_details= $get_department->fetch_assoc()){

					  
					?>
				
					<div class="form-group"> <label for="depart_id" class="col-sm-2 control-label">Department Id</label>
						<div class="col-sm-9"> <input disable value="<?php echo $dept_details['department_id'];?>" type="text" class="form-control" id="inputEmail3" name="dept_id" autocomplete = off readonly> </div>
                   </div>
				   <div class="form-group"> <label for="depart_name" class="col-sm-2 control-label">Department Name</label>
						<div class="col-sm-9"> <input  value="<?php echo $dept_details['department_name'];?>" type="text" class="form-control" id="inputEmail3" name="dept_name" placeholder="Enter dept. name ..."autocomplete = off> </div>
                   </div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Department Head</label>
					<div class="col-sm-9"> <select class="form-control" style="padding:10px" name="dept_head"> 
					      <option value=" ">Select Head Of department </option>
						  <?php
						     $dept_head=$ravi->department_head();
							 while($department_head_fetch = $dept_head->fetch_assoc()){

						  ?>
						  <option value="<?php echo $department_head_fetch['staff_id'];?>"><?php echo $department_head_fetch['username'];?></option>						  
						  <?php  } ?>
						</select>
					</div>
					</div>
				<?php }?>
					<div class="col-sm-offset-2"> 
						<input type="submit" class="btn btn-primary" style="background-color:green" name="update" value ="Update Department Info">
						
				</form>
			</div>

		</div>		
	</div>