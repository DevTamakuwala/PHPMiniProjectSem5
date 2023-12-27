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

	if(isset($_SESSION['uid']))
	{
		$uid = $_SESSION['uid'];
		if ($_SESSION['name'] != "Admin") {
			$qry="select * from tblOrder o, tbluser u, tblbook b where u.userid = o.userId and o.userId=$uid and b.pid=o.productId";
		}else{
			$qry="select * from tblOrder o, tbluser u, tblbook b where u.userid = o.userId and b.pid=o.productId";
		}

		$res=mysqli_query($con,$qry);
	}
?>
<html>
	<head>
		<title>All Orders</title>
		<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
		<script type="text/javascript" src="assets/bootstrap.min.js"></script>
	</head>
	<body>

		<?php include("header.php");?>

		<div class="container">
    <table class="table table-striped my-5">
        <thead>
            <tr>
                <th>OrderID</th>
                <th>Product Name</th>
                <?php if ($_SESSION['name']=="Admin") 
                	{
                ?>
                    <th>Username</th>
                <?php
                	}
                ?>
                <th>Price</th>
                <th>Date</th>
                <th>Image</th>
            </tr>
            <?php 
            	while($x=mysqli_fetch_array($res)){
            		?>

        		<tr>
                	<th><?=$x['orderID']?></th>
	                <th><?=$x['pname']?></th>
	                <?php if ($_SESSION['name']=="Admin") 
	                	{
	                ?>
	                    <th><?=$x['name']?></th>
	                <?php
	                	}
	                ?>
	                <th><?=$x['price']?></th>
	                <th><?=$x['orderDateTime']?></th>
	                <th>
	                	<img class="card-img-top" src="images/<?=$x['images']?>" alt="Card image cap"  height="100px">
	                </th>
	            </tr>	

            		<?php 

            	}
            ?>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
		<?php include("footer.php") ?>

	</body>
</html>