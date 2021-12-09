<?php 
include "../setting/config.php";
include "../setting/validate.php";
session_start();
if(!$_SESSION['meadmin'])
{
	header("location:index.php");
}
else
{
	$adminname = $_SESSION['meadmin'];
	$meadmin_username = $ravi->meadmin_username($adminname);
	$meadmin_username_display = $meadmin_username->fetch_assoc();
	$meadmin_info= $meadmin_username_display['username']; 
	$t_staff_type = $meadmin_username_display['designation'];
	$info = $ravi->teacher_info($adminname,$t_staff_type);
	$info_display = $info->fetch_assoc();
	
}



?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<?php
include("./header.php")

?>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="header-section">

					<div class="clearfix"></div>
				</div>
				<!-- //header-ends -->

				<?php 
				
				
				
				$homepage = "home1";
				if(isset($_GET['ravi']))
				{
					$homepage = $_GET['ravi'];
				}
				include $homepage.".php";
				
				
						
				?>
				
				
				
				
				
				
				<!--footer section start-->
				<footer>
					<p>&copy 2021  . All Rights Reserved | Design by <a href="https://gordonotieno.github.io/" target="_blank">Coder.</a> and Develop By Coder</p>
				</footer>
				<!--footer section end-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<div class="sidebar-menu">
			<header class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Gordon</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a>
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			<div class="down">
				<div class="adjust-size"><a href="index.html"><img style="max-width:70%; max-height:70%;" src="images/superadmin.jpg"></a></div>
				<a href="index.php"><span class=" name-caret"><?php echo $info_display['f_name']; ?></span></a>
				<p>School Administrator</p>
				<ul>
					<li><a class="tooltips" href="index.html"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
					<li><a class="tooltips" href="index.html"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
					<li><a class="tooltips" href="logouts.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
				</ul>
			</div>
			<!--//down-->
			<div class="menu">
				<ul id="menu">
					<li><a href="home.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
					<li id="menu-academico"><a href="#"><i class="fa fa-table"></i> <span>Students</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=student-information">Students Information</a></li>
							<li id="menu-academico-boletim"><a href="home.php?ravi=add-student">Add Students</a></li>
							<li style="background-color" id="menu-academico-avaliacoes"><a href="home.php?ravi=student-remove" style="color:red">Remove Students</a></li>

						</ul>
					</li>
					
					<li id="menu-academico"><a href="#"><i class="fa fa-file-text-o"></i> <span>Teacher</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						
					<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=teacher-information">Teacher Information</a></li>
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=teacher-edit">Edit Teacher</a></li>
							<li id="menu-academico-boletim"><a href="home.php?ravi=teacher-add">Add Teacher</a></li>
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=teacher-delete">Delete Teacher</a></li>

						</ul>
					</li>

					<li id="menu-academico"><a href="#"><i class="fa fa-file-text-o"></i> <span>Department</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						
						<ul id="menu-academico-sub">
								<li id="menu-academico-avaliacoes"><a href="home.php?ravi=department-information">Department Information</a></li>
								<li id="menu-academico-avaliacoes"><a href="home.php?ravi=edit-department">Edit Department</a></li>
								<li id="menu-academico-boletim"><a href="home.php?ravi=department-add">Add Department</a></li>
								<li id="menu-academico-avaliacoes"><a href="home.php?ravi=department-delete">Delete Department</a></li>
	
							</ul>
					</li>

					<li id="menu-academico"><a href="#"><i class="fa fa-file-text-o"></i> <span>Students Results</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						
						<ul id="menu-academico-sub">
								<li id="menu-academico-avaliacoes"><a href="home.php?ravi=capture-results">Add Results</a></li>
								<li id="menu-academico-avaliacoes"><a href="home.php?ravi=view-results">View Results</a></li>
								<li id="menu-academico-boletim"><a href="home.php?ravi=print-results">Print results</a></li>
	
							</ul>
					</li>
			
					<li id="menu-academico"><a href="#"><i class="fa fa-file-text-o"></i> <span>Settings</span> <span class="fa fa-angle-right" style="float: right"></span></a>
					<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=general-information">General Information</a></li>
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=edit-general-information">Edit General Information</a></li>
						
						</ul>
					</li>
				
			
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>

<script>
       function getdata(){
      var txtOne = document.getElementById('std_class').value;
	  alert("testing");
      echtxtOne;
</script>
	<!--js -->
	<link rel="stylesheet" href="css/vroom.css">
	<script type="text/javascript" src="js/vroom.js"></script>
	<script type="text/javascript" src="js/TweenLite.min.js"></script>
	<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>