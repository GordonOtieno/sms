	<div class="outter-wp">
									<!--sub-heard-part-->
									  <div class="sub-heard-part">
									   <ol class="breadcrumb m-b-0">
											<li><a href="index.html">Home</a></li>
											<li class="active"><?php if(isset($_GET['ravi'])){ echo strtoupper($page=$_GET['ravi']); } ?></li>
										</ol>
									   </div>
								  <!--//sub-heard-part-->
									<div class="graph-visual tables-main">
											<h2 class="inner-tittle"><?php echo strtoupper($_GET['ravi']); ?></h2>
												
							<form method="post">
								<select name="class_students_data" id="selector1" class="form-control1">
									<option>Select Class</option>
									<?php 
								$opt = $ravi->grade($grade);
								while($opt_class_fetch = $opt->fetch_assoc())
								{
								?>
										<option value="<?php echo $opt_class_fetch['grade_id']; ?>"><?php echo $opt_class_fetch['grade_name']; ?></option>
										
								<?php } ?>
								</select>
								<input type="submit" name="students_info" class="btn red" value="View Class Data">
								<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert" style="border-radius: .5rem;"><?php echo $_GET['error']; ?></div>
					<?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success" role="alert" style="border-radius: .5rem;"><?php echo $_GET['success']; ?></div>
                    <?php } ?>
					
	
									</form>	

										<?php
										
										if(isset($_POST['students_info']))
										{
											$class_students_data = $_POST['class_students_data'];
										$student_dis_admin=	$ravi->student_info_display_all($class_students_data);
											$s_sn = 1;
														
										
										?>
										
										
															  <div class="graph">
															<div class="tables">
														
																<table class="table table-bordered "> 
															 
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Student No</th> 
																			<th>F.Name</th> 
																			<th>L.Name</th> 
																			<th>Gender</th>
																			<th>Pre-Condition</th>
																			<th>Resident</th>
																			<th>Date Admission</th>
																			<th>DOB</th>
																			<th>Guardian Name</th>
																			<th>Guardian Phone</th>
																			<th>Guardian Phone2</th>
																			<th>Guardian Email</th>
																			<th>Status</th>
																			
																		</tr>
																	</thead>
																	<tbody> 
																		
										
												
														
													
															<?php 
											 if($student_dis_admin->num_rows>0){
												 
											 
											while($student_info_admin =$student_dis_admin->fetch_assoc()){ ?>						
																
														<tr>
																	<td><?php echo $s_sn; ?></td>
															<td><?php echo $student_info_admin['student_no'];?></td>
															<td><?php echo $student_info_admin['f_name']; ?></td>
															<td><?php echo $student_info_admin['l_name']; ?></td>
															<td><?php echo $student_info_admin['gender']; ?></td>
															<td><?php echo $student_info_admin['pre_condition']; ?></td>
															<td><?php echo $student_info_admin['residential_area']; ?></td>
															<td><?php echo $student_info_admin['admission_date']; ?></td>
															<td><?php echo $student_info_admin['dob'] ?></td>
															<td><?php echo $student_info_admin['guardian_name']; ?></td>
															<td><?php echo $student_info_admin['guardian_contact1']; ?></td>
															<td><?php echo $student_info_admin['guardian_contact2']; ?></td>
															<td><?php echo $student_info_admin['guardian_email']; ?></td>
															<td><?php echo $student_info_admin['status']; ?></td>
															<td>
														  <div class="stdentdel" style="display:flex; margin:0px; " >
														      <a style="padding:5px 10px; margin:0px;" href="home.php?ravi=remove-student&studentid=<?php echo $student_info_admin['student_no']; ?>" class="btn red">delete</a>
															</div>
														   </td>
																		</tr>
																<?php $s_sn++; }} else {
										 ?>
																		<td colspan="12">No any Students information found
																			</td>
																		<?php 
										} }  ?>
																	</tbody> 
															
																</table> 
															</div>
													</div>
																
											
										</div>
										<!--//graph-visual-->
									</div>