


<?php
require 'includes/header.php';
?>
				
				<!--content-->
				<div class="pro">
			<div class="content">
<div class="women_main">
	<!-- start content -->
	<div class="check">	 
			
		 <?php


 
                        $id = $_GET["id"];

                       require 'includes/projectdb.php';

   $sql = "SELECT id, username, project_file, project_name, project_cat, status, project_desc, minimum_pay, maximum_pay, start_date, due_date FROM users_project WHERE id='".$id."'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                       
?>
			
			 
			 
			 
			 
			

		

			

		 <div class="col-md-9 cart-items">
			 <h1>Project</h1>


	
				<div class="col-sm-8 well">
                    <h3 class="text-right"><a href="editp.php">Edit</a></h3>
					<h2><b>Project Details</b></h2>
					<br>
					<b>Project Name</b>:
						<p> <?php echo $row['project_name']; ?></p>
						<b>Project Category</b>:
						<p> <?php echo $row['project_cat']; ?></p>
						<b>Project Status</b>:
						<p> <?php echo $row['status']; ?></p>
						<b>Project Description</b>:
						<p> <?php echo $row['project_desc']; ?></p>
						<b>Project Minimum Pay</b>:
						<p> <?php echo $row['minimum_pay']; ?></p>
						<b>Project Maximum Pay</b>:
						<p> <?php echo $row['maximum_pay']; ?></p>
						<b>Start Date</b>:
						<p> <?php echo $row['start_date']; ?></p>
						<b>Due Date</b>:
						<p> <?php echo $row['due_date']; ?></p>
						<b>Project File</b>
						<p><a href="<?php echo 'uploads/' .$row['project_file']; ?>">Open</a></p>
						<b>Click to View Project</b>
						<p><a href="#">View</a></p>

						<h3>Developers Details</h3>
						<b>Developer Name</b>
						<p></p>
						<b>Developer Rating</b>
						<p></p>
						<b>Developer Stage</b>
						<p></p>
                



<?php  
}}
$con->close();
?>



				</div>

									 




			
				
				

		
			 
			 
			 
			 
			  </div>		
		 </div>
		 
		
			<div class="clearfix"> </div>
	 </div>
</div>
	<!-- end content -->
	<?php include 'includes/footer.php'; ?>
				<!--//content-inner-->
			<!--/sidebar-menu-->
			<?php include 'includes/sidebar.php'; ?>
			<!--sidebar-menu-ends-->
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
  
		   <script src="js/menu_jquery.js"></script>
</body>
</html>