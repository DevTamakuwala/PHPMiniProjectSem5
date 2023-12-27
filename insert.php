<?php
	session_start();
	$con=mysqli_connect("localhost","root","","bookdb");

	if(isset($_REQUEST['btnIns']))
	{
		$pname=$_REQUEST['txtpname'];
		$pname=$_REQUEST['txtcompany'];
		$price=$_REQUEST['txtPrice'];
		$color=$_REQUEST['txtcolor'];
		$img=$_FILES['fup']['name'];

		copy($_FILES['fup']['tmp_name'], "images/".$img) or die("cannot upload file");

		mysqli_query($con,"insert into tblbook values (null,'$pname','$company','$price','$color','$img')") or die("somthing went wrong");
		header("location:view.php");
	}
?>
<html>	
	<head>
		<title>Insert</title>
		<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
		<script type="text/javascript" src="assets/bootstrap.min.js"></script>
	</head>
	<body>
		<?php 
			include("header.php")
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 m-2">
					<form method="post" enctype="multipart/form-data">
						<table class="table table-hover border border-primary" style="margin-top: 150.5px; margin-bottom: 150.5px;">
							<tr>
								<td>Product Name<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="text" class="form-control" required name="txtpname">
								</td>
							</tr>
							<tr>
								<td>Company<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="text" class="form-control" required name="txtcompany">
								</td>
							</tr>
							<tr>
								<td>Price<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="text"  class="form-control" required name="txtPrice">
								</td>
							</tr>
							<tr>
								<td>Color<p style="color: red; display: inline-block;">&nbsp *</p></td>
								<td>
									<input type="text" class="form-control" required name="txtcolor">
								</td>
							</tr>
							<tr>
								<td>Image</td>
								<td>
									<input type="file" class="form-control" name="fup">
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<input type="submit" class="btn btn-success" value="Add Product" name="btnIns">
								</td>
							</tr>
						</table>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		<?php include("footer.php") ?>
	</body>
</html>