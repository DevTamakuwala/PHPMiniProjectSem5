<?php 
	session_start();
	$con=mysqli_connect("localhost","root","","bookdb");

	if(!isset($_SESSION['uname']))
		header("location:login.php");

	if(isset($_REQUEST['pid']))
	{
		$id=$_REQUEST['pid'];
	}

	if(isset($_REQUEST['pid']))
	{
		$id=$_REQUEST['pid'];
		$uid = $_SESSION['uid'];
		$date = date("Y-d-m");
		$qry = "insert into tblOrder values(null,'$id','$uid','$date')";
		echo $date;
		$res=mysqli_query($con, $qry);
		header("location:allOrders.php");
	}

	if(isset($_REQUEST['btnlogout']))
	{
		session_destroy();
		header("location:login.php");
	}

	if(isset($_REQUEST['mid']))
	{
		$id=$_REQUEST['mid'];
		$qry="select * from tblbook where pid=$id";

		$res=mysqli_query($con,$qry);
	}
?>
<html>
	<head>
		<title>More Info</title>
		<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
		<script type="text/javascript" src="assets/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include("header.php");?>
		<div class="container my-4">
    <div class="row my-4">
	    <div class="col-md-6">
	    	<?php
				while($x=mysqli_fetch_array($res))
				{
				?>
				<img class="card-img-top" src="images/<?=$x['images']?>" alt="Card image cap">
				
		    </div>
		    <div class="col-md-6">
		        <h2><p ID="lblpname"></p><?=$x['pname']?></h2> 
		        <p>
		            <p ID="lblAname">By, <?=$x['company']?></p>
		        </p>
		        <div>
		            <p ID="lblPrice">Price, <?=$x['price']?></p>
		        </div>
		        <div>
		            <p ID="lblDesc">Color, <?=$x['color']?></p>
		        </div>

		        <div>

		            <a class="btn btn-primary col-md-2 my-5" href="moreInfo.php?pid=<?=$x['pid']?>">Buy Now</a>
		        </div>
		        <?php  
				}
				?>
		    </div>
		</div>
	</div>
		<?php include("footer.php") ?>
	</body>
</html>