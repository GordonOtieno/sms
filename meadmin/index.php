<?php 
session_start();


include "../setting/config.php";



if(isset($_POST['admin_signin']))
{

$admin_username = mysqli_real_escape_string($ravi->hackme(),$_POST['admin_username']);
$admin_password = mysqli_real_escape_string($ravi->hackme(),$_POST['admin_password']);
// echo $admin_username.' '.$admin_password ;
if($admin_username=="" AND $admin_password=="")
{
echo "<script>alert('Enter Your Username & Password');</script>";
}
else
{
$melogin = $ravi->meadmin_check($admin_username,$admin_password);
if($melogin==1)
{
$_SESSION['meadmin'] = 	$admin_username;
header("location:home.php");
}


else
{
echo "<script>alert('Email Or Password does not matched');</script>";
}

}


}

if(isset($_SESSION['meadmin']))
{
header("location:home.php");
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

		<!--/login-->
		
				<div class="error_page">
						<!--/login-top-->
						
							<div class="error-top">
							
								<h2 class="inner-tittle page">Login</h2>
							
								<div class="login">
									<h3 class="inner-tittle t-inner">School Management System</h3>
								
										<!-- <div class="buttons login">
													<ul>
														<li><a href="#" class="hvr-sweep-to-right">Facebook</a></li>
														<li class="lost"><a href="#" class="hvr-sweep-to-left">Twitter</a> </li>
														<div class="clearfix"></div>
													</ul>
												</div> -->
										<form method="post">
<input type="text" class="text" name="admin_username" placeholder="Username" value="<?php if(isset($_POST['admin_signin'])){ echo $_POST['admin_username']; } ?>">
<input type="password" placeholder="Password" name="admin_password" value="<?php if(isset($_POST['admin_signin'])){ echo $_POST['admin_password']; } ?>">
<div class="submit"><input type="submit" value="Login" name="admin_signin"></div>
			<div class="clearfix"></div>
												
										
											</form>
								</div>

								
							</div>
							
							
						<!--//login-top-->
					</div>

					<!--//login-->
					<!--footer section start-->
				<div class="footer">
						<div class="error-btn">
									<a class="read fourth" href="index.html">Return to Home</a>
									</div>
					<p>&copy 2021  . All Rights Reserved | Design by <a href="https://gordonotieno.github.io//" target="_blank">coder</a></p>
				</div>
			<!--footer section end-->
			<!--/404-->
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>