<html>
	<body>
		<div class="nav bg-white text-muted p-3 d-flex justify-content-between" style="font-size: 18px;">
		<div class="text-reset mt-2" style="font-weight: 500;">Welcome, <?php echo $_SESSION['name']; ?></div>
			<div>
				<span> <a href="view.php" class="text-reset mx-3">Home</a></span>

				<span> <a href="#about" class="text-reset mx-3">About us</a></span>

				<span> <a href="#contact" class="text-reset mx-3">Contact us</a></span>

				<span> <a href="allOrders.php" class="text-reset mx-3">View All Orders</a></span>

				<?php  
					if($_SESSION['name']=="Admin")
					{
				?>	
				
				<span> <a href="insert.php" class="text-reset mx-3">Add Item</a></span>
				<?php  
					}
				?>
				<span>
					<form method="post" style="display: inline-block;">
						<input type="submit" class="btn btn-white text-reset mb-1" style="text-decoration: underline; font-weight: 500; font-size: 18px;" value="Logout" name="btnlogout">
					</form>
				</span>
			</div>
		</div>
	</body>
</html>