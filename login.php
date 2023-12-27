<?php
	session_start();
	$con=mysqli_connect("localhost","root","","bookdb");
	if(isset($_SESSION['uname']))
		header("location:view.php");

	if(isset($_REQUEST['btnLogin']))
	{
		$uname=$_REQUEST['txtUname'];
		$pwd=$_REQUEST['txtPwd'];

		$qry="select * from tbluser where username='$uname' and password='$pwd'";

		$res=mysqli_query($con,$qry) or die($qry);

		if(mysqli_num_rows($res)>0)
		{
			$userdata=mysqli_fetch_array($res);
			$_SESSION['uid']=$userdata['userid'];
			$_SESSION['uname']=$userdata['username'];
			$_SESSION['name']=$userdata['name'];
			header("location:view.php");
		}
		else
		{
			echo "Invalid username or password";
		}
	}
?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
		<script type="text/javascript" src="assets/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 border border-primary mt-5 p-3">
					
					<form method="post">
						<h2>Login</h2>
						<table class="table">
							<tr>
								<td>Username<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="text" class="form-control" name="txtUname" required>
								</td>
							</tr>
							<tr>
								<td>Password<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="text" class="form-control" name="txtPwd" required>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" class="btn btn-primary" value="Login" name="btnLogin">
								</td>
							</tr>
						</table>
						<center>
							<a href="reg.php">New User..?? Register Here</a>
						</center>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</body>
</html>