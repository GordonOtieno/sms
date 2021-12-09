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
								<select name="class_students_results" id="selector1" class="form-control1">
									<option>Select Grade To view results...</option>
									<?php 
								$opt = $ravi->grade($grade);
								while($opt_class_fetch = $opt->fetch_assoc())
								{
								?>
										<option value="<?php echo $opt_class_fetch['grade_id']; ?>"><?php echo $opt_class_fetch['grade_name']; ?></option>
										
								<?php } ?>
								</select>
								<input type="submit" name="students_results" class="btn red" value="View Grade Results">
												<?php if (isset($_GET['error'])) { ?>
									<div class="alert alert-danger" role="alert" style="border-radius: .5rem;"><?php echo $_GET['error']; ?></div>
									<?php } ?>

									<?php if (isset($_GET['success'])) { ?>
									<div class="alert alert-success" role="alert" style="border-radius: .5rem;"><?php echo $_GET['success']; ?></div>
									<?php } ?>
					
	
							</form>	

										<?php
										
										if(isset($_POST['students_results']))
										{
											$class_students_result = $_POST['class_students_results'];
											echo $class_students_result;
										$class_results=$ravi->students_results_info($class_students_result);
											$r_sn = 1;
														
										
										?>
										
										
															  <div class="graph">
															<div class="tables">
														
																<table class="table table-bordered "> 
															 
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Student No</th> 
																			<th>Student Name</th> 
																			<th>Maths</th> 
																			<th>English</th>
																			<th>Kiswahili</th>
																			<th>Science</th>
																			<th>SS/T</th>
																			<th>Term</th>
																			<th>Total Score</th>
																			<th>Remarks</th>
																			
																		</tr>
																	</thead>
																	<tbody> 
																		
										
												
														
													
															<?php 
											 if($class_results->num_rows>0){
												 
											 
											while($student_result =$class_results->fetch_assoc())					{ ?>						
																
														<tr>
																	<td><?php echo $r_sn; ?></td>
															<td><?php echo $student_result['student_id']; ?></td>
															<td><?php echo $student_result['f_name']; ?></td>
															<td><?php echo $student_result['maths']; ?></td>
															<td><?php echo $student_result['eng']; ?></td>
															<td><?php echo $student_result['kis']; ?></td>
															<td><?php echo $student_result['sci']; ?></td>
															<td><?php echo $student_result['sst']; ?></td>
															<td><?php echo $student_result['term'] ?></td>
															<td><?php echo $student_result['guardian_name']; ?></td>
															<td><?php echo $student_result['remarks']; ?></td>
															
															<td>
														  <div class="stdentdel" style="display:flex; margin:0" >
															  <a style="padding:5px 10px;" href="home.php?ravi=student-update&studentid=<?php echo $student_info_admin['student_no']; ?>" class="btn green">Edit</a>
														      <a style="padding:5px 10px;" href="home.php?ravi=deactivate-student&studentid=<?php echo $student_info_admin['student_no']; ?>" class="btn red">delete</a>
															</div>
														   </td>
																		</tr>
																<?php $s_sn++; }} else {
										 ?>
																		<td colspan="12">No any Results Record found
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