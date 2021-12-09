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

	
			<div class="tables">


				<table class="table table-bordered ">

					<thead>
					<tr>
								<th>#</th>
								<th>TSC No.</th> 
								<th>F. Name</th> 
								<th>L. name</th> 
							    <th>Employment date</th>
							    <th>Gender</th>
								<th>Email</th>
								<th>Highest Qualification</th>
								<th>Phone no.</th>
								<th>Designation</th>
								<th>Department</th>
							
																			
							    </tr>
					</thead>
					<tbody>

						<?php $teacher_dis_admin = $ravi->teacher_info_display_admin();
													$t_sn = 1;
													while($teacher_info_admin =$teacher_dis_admin->fetch_assoc())					{
															
																		?>
						<tr>
							<th scope="row">
								<?php echo $t_sn; ?>
							</th>
							<td>
								<?php echo $teacher_info_admin['tsc_no']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['f_name']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['l_name']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['employment_date']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['gender']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['email']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['Highest_qualification']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['phone_no']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['designation']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['departmet']; ?>
							</td>
							
							<td>
			
								<a href="home.php?ravi=teacher-editnow&teacherid=<?php echo $teacher_info_admin['staff_id']; ?>" class="btn green">Edit</a>
							
			
								<a href="home.php?ravi=teacher-editnow&teacherid=<?php echo $teacher_info_admin['staff_id']; ?>" class="btn red">delete</a>
							</td>
						</tr>
						<?php $t_sn++; } ?>
					</tbody>

				</table>

			</div>
		</div>


	</div>
	<!--//graph-visual-->

