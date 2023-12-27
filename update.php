<?php  
	session_start();
	$con=mysqli_connect("localhost","root","","bookdb");
		//servername,username,password,database name
	if(!isset($_SESSION['uname']))
		header("location:login.php");
	$id=$_REQUEST['uid'];
	$qry="select * from tblbook where pid=$id";
	$res=mysqli_query($con,$qry) or die($qry);
	$productData=mysqli_fetch_array($res);

	if(isset($_REQUEST['btnUpdBook']))
	{
		$pname=$_REQUEST['txtpname'];
		$company=$_REQUEST['txtcompany'];
		$price=$_REQUEST['txtPrice'];
		$color=$_REQUEST['txtcolor'];

		if($_FILES['fup']['name']!="")
		{
			$img=$_FILES['fup']['name'];
			copy($_FILES['fup']['tmp_name'],"images/".$img) or die("cannot upload image");
			unlink("images/".$productData['images']);
		}
		else
		{
			$img=$productData['images'];
		}
		
		$qry="update tblbook set pname='$pname',company='$company',price='$price',color='$color',images='$img' where pid=$id";
		mysqli_query($con,$qry) or die($qry);
		header("location:view.php");       
	}
?>
<html>
	<head>
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
				<div class="col-md-6">
					<form method="post" enctype="multipart/form-data">
				<table class="table table-hover border border-secondary" style="margin-top: 18px; margin-bottom: 18px;">
					<tr>
						<td>pname<p style="color: red; display: inline-block;">&nbsp *</td>
						<td>
							<input type="text" name="txtpname" value="<?=$productData['pname']?>" required>
						</td>
					</tr>
					<tr>
						<td>company<p style="color: red; display: inline-block;">&nbsp *</td>
						<td>
							<input type="text" name="txtcompany" value="<?=$productData['company']?>" required>
						</td>
					</tr>
					<tr>
						<td>Price<p style="color: red; display: inline-block;">&nbsp *</td>
						<td>
							<input type="text" name="txtPrice" value="<?=$productData['price']?>" required>
						</td>
					</tr>
					<tr>
						<td>color<p style="color: red; display: inline-block;">&nbsp *</td>
						<td>
							<input type="text" required name="txtcolor" value="<?=$productData['color']?>">
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
							<input type="submit"  class="btn btn-success" value="Update Product" name="btnUpdBook">
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