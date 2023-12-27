<?php  
	$con=mysqli_connect("localhost","root","","bookdb");

	if(isset($_REQUEST['btnReg']))
	{
		$uname=$_REQUEST['txtUname'];
		$pwd=$_REQUEST['txtPwd'];
		$mail=$_REQUEST['txtEmail'];
		$gen=$_REQUEST['gen'];
		$name=$_REQUEST['txtName'];
		$city=$_REQUEST['city'];

		$qry="insert into tbluser values(null,'$name','$uname','$pwd','$mail','$gen','$city')";
		mysqli_query($con,$qry) or die($qry);
		header("location:login.php");
	}
?>

<html>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
		<script type="text/javascript" src="assets/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 border border-primary mt-5 p-3">
					<form method="post">
						<table  align="center" width="50%" class="table">
							<tr>
								<td>Name<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="text" class="form-control" required name="txtName">
								</td>
							</tr>
							<tr>
								<td>Username<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="text" class="form-control" required name="txtUname">
								</td>
							</tr>
							<tr>
								<td>Password<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="text" class="form-control" required name="txtPwd">
								</td>
							</tr>
							<tr>
								<td>Email<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="email" class="form-control" required name="txtEmail">
								</td>
							</tr>
							<tr>
								<td>Gender<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									Male<input type="radio" value="Male" name="gen">
									Female<input type="radio" value="Female" name="gen">
									Others<input type="radio" value="Others" name="gen">
								</td>
							</tr>
							<tr>
								<td>City</td>
								<td>
									<select name="city">
										<option value="Select City">Select City</option>
										<option value="Surat">Surat</option>
										<option value="Mumbai">Mumbai</option>
										<option value="Pune">Pune</option>
										<option value="Ahemdabad">Ahemdabad</option>
									</select>
								</td>
							</tr><tr>
								<td colspan="2">
									<input class="btn btn-primary" type="submit" value="Register" name="btnReg">
								</td>
							</tr>
						</table>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</body>
</html>