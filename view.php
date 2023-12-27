<?php 
	session_start();
	$con=mysqli_connect("localhost","root","","bookdb");

	if(!isset($_SESSION['uname']))
		header("location:login.php");


	if(isset($_REQUEST['btnlogout']))
	{
		session_destroy();
		header("location:login.php");
	}

	if(isset($_REQUEST['did']))
	{
		$id=$_REQUEST['did'];
		$qry="delete from tblbook where pid=$id";

		mysqli_query($con,$qry);
	}

	$res=mysqli_query($con,"select * from tblbook");
	if(isset($_REQUEST['btnSearchBook']))
	{
		$name=$_REQUEST['txtpname'];
		$res=mysqli_query($con,"select * from tblbook where pname like '%$name%'");

	}

	if(isset($_REQUEST['btnSortName']))
	{
		$res=mysqli_query($con,"select * from tblbook order by pname");
	}
	if(isset($_REQUEST['btnSortPrice']))
	{
		$res=mysqli_query($con,"select * from tblbook order by price desc");
	}
?>
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
		<script type="text/javascript" src="assets/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include("header.php");?>
		<div class="container my-4">
    <div class="row">
        <div class="row col-md-10">
            <div class="row mx-2 my-2">
                   <?php
				while($x=mysqli_fetch_array($res))
				{
				?>
					<div class="card m-2" style="width: 18rem;">
						<h2><?=$x['pname']?></h2>
					  <img class="card-img-top" src="images/<?=$x['images']?>" alt="Card image cap">
					  <div class="card-body">
					    <p class="card-text">by,<?=$x['company']?></p>
					    <p>Rs. <?=$x['price']?></p>
					  </div>
					  <?php  
							if($_SESSION['name']=="Admin")
							{
						?>
						<div class="row">
						<a class="btn btn-primary col-md-5 m-2" href="view.php?did=<?=$x['pid']?>">Delete</a>
						<a class="btn btn-primary col-md-5 m-2" href="update.php?uid=<?=$x['pid']?>">Update</a>
						</div>
						<?php
							}
							else{
								?>
								<div class="row">
									<a class="btn btn-primary col-md-5 m-2" href="moreInfo.php?mid=<?=$x['pid']?>">More Info</a>
		 						</div>
								<?php
							}
						?>
					</div>
				<?php  
				}
				?>         
            </div>
        </div>
        <div class="col-md-2">
        	<form method="post">
				<input type="text" placeholder="Search Name" class="form-control" name="txtpname">
				<input type="submit" class="btn btn-primary my-2" value="Search Item" name="btnSearchBook">
				<input type="submit" class="btn btn-primary my-2" value="Sort by name" name="btnSortName">
				<input type="submit" class="btn btn-primary my-2" value="Sort by price" name="btnSortPrice">
			 	<input type="submit" class="btn btn-primary my-2" value="Reset" name="">
			</form>
        </div>
    </div>
		<?php include("footer.php") ?>
	</body>
</html>