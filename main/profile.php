<?php
ob_start();

?>


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
	require '../db.php';

   $sql = "SELECT * FROM users_details WHERE username = '" . $_SESSION['username'] . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  
  
        ?>
			
			 
	
			 
			 
			

		

			

		 <div class="col-md-9 cart-items">
			

<div class="col-sm-3 well sidenav" style="float: left;">
 <img src="images/<?php echo $row['profile_img'];?>" height="100%" width="100%" alt="Avatar">
 <br><br>
 
 



 <?php
 if(isset($_POST["edit"])){
  $target_dir = "images/";
    $profile_img = basename( $_FILES['uploaded_file']['name']);
    $target_file = $target_dir . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }

 $sql = "UPDATE users_details SET profile_img='$profile_img' WHERE username='".$username."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
}
?>

	</div>	 
	
				<div class="col-sm-8 well" style="float: right;">
					<div style="float: right;">
					<a href="eprofile.php"><button type="button" class="btn btn-success">Edit</button></a>
				</div>
					<h2><b>Personal Details</b></h2>
					<br>
					<p><b>Username </b>:<?php echo $row['username'];?></p>
					<p><b>Email Address </b>: <?php echo $row['email']; ?></p>
					<p><b>Phone Number </b>: <?php echo $row['phone_num']; ?></p>
					<p><b>Address </b>: <?php echo $row['address']; ?></p>
					<p><b>City </b>: <?php echo $row['city']; ?></p>
					<p><b>Country </b>: <?php echo $row['country']; ?></p>



				</div>



			
				
			
		
        	<div class="col-sm-8 well" style="float: right;">


					<h2><b>Payment Details</b></h2>
					

					<br>
				<p><b>Payment Mode </b>: <?php echo $row['payment_mode']; ?></p>
					<p><b>Email Address </b>: <?php echo $row['payment_mail']; ?></p>
					<?php
}}
$con->close();
?>

				</div>

		

			
				<div class="col-sm-8 well" style="float: right;">
                    <div style="float: right;">
					<a href="eprofile1.php"><button type="button" class="btn btn-success">Edit</button></a>
				</div>
					<h2><b>Developers Details</b></h2>
					<br>
					
<?php
	require '../db.php';

   $sql = "SELECT about_dev, dev_top_skills, dev_other_skills, dev_portfolios, dev_doc, dev_lang, dev_stage, payment_mode, payment_mail FROM other_dev_details WHERE username = '" . $_SESSION['username'] . "'";
$result = $con->query($sql);
//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  
  
        ?>
						
						<p><b>Developer's Stage </b>: <?php echo $row['dev_stage']; ?></p>
						<p><b>Developer's Top Skills </b>: <?php echo $row['dev_top_skills']; ?></p>
						<p><b>Developer's Other Skills </b>: <?php echo $row['dev_other_skills']; ?></p>
						<p><b>Developer's Portfolios </b>: <?php echo $row['dev_portfolios']; ?></p>
						<p><b>About Developer </b>: <?php echo $row['about_dev']; ?></p>
						<p><b>Developer's Language </b>: <?php echo $row['dev_lang']; ?></p>
						<p><b>Developer's Documents </b>: <?php echo $row['dev_doc']; ?></p>
						<p><b>Developer's Ratings </b>: <span class="fa fa-star checked"></span>
                 <span class="fa fa-star checked"></span>
                 <span class="fa fa-star checked"></span>
                 <span class="fa fa-star checked"></span>
                 <span class="fa fa-star"></span></p>

				

				</div>
				
		
				

		
<?php
}}
$con->close();
?>
		
			 
			 

		
			 
			 
			 
			 
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