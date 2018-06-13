
<?php
ob_start();

?>



<?php include 'includes/header.php'; ?>
<?php
  require('includes/storedb.php');
if(isset($_POST["submit"])){


    $target_dir = "uploads/";
    $software_file = basename( $_FILES['uploaded_file']['name']);
    $target_file = $target_dir . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  


        $software_url =htmlspecialchars( $_POST["software_url"]);
        $software_tagline =htmlspecialchars( $_POST["software_tagline"]);
        $software_desc =htmlspecialchars($_POST["software_desc"]);
        $minimum_pay =htmlspecialchars($_POST["minimum_pay"]);
        $maximum_pay =htmlspecialchars($_POST["maximum_pay"]);
        $username =htmlspecialchars($_SESSION['username']);
        $status =htmlspecialchars($_POST["status"]);
        $reg_date = date("Y-m-d H:i:s");

 $sql = 'INSERT INTO software (username, software_url, status, software_file, software_tagline, software_desc, minimum_pay, maximum_pay, reg_date) VALUES ("'.$username.'", "'.$software_url.'","pending","'.$software_file.'","'.$software_tagline.'","'.$software_desc.'","'.$minimum_pay.'","'.$maximum_pay.'", "'.$reg_date.'") ';
       
            if ($con->query($sql) === TRUE) {
    
    $_SESSION['submit'] = true; header('LOCATION:confirmation.php'); die();
} else {
	echo '<div class="alert alert-danger">';
    echo '<strong>Error!</strong> ' . $sql . "<br>" . $con->error;;
    echo '</div>';
}



}



?>
				
				<!--content-->
			<div class="content">
<div class="women_main">
	<!-- start content -->
	<div class="faq">
	
	<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
							<h4>Stage 1</h4>
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" action="software.php" enctype="multipart/form-data" method="post" onSubmit=window.location='package.php'>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Software url</label>
											<div class="col-sm-8">
												<input type="url" class="form-control1" id="software_url" placeholder="https://groovedevelopers.com" name="software_url">
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Tagline</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="software_tagline" placeholder="e.g Media Site" name="software_tagline">
											</div>
										</div>
										<div class="form-group">
											<label for="description" class="col-sm-2 control-label">Description</label>
											<div class="col-sm-8"><textarea name="software_desc" id="software_desc" cols="50" rows="4" class="form-control1"></textarea></div>
										</div>
										
										<div class="form-group">
										<label for="exampleInputFile">Drop the template and it credentials here</label>
										<div class="col-sm-8">
										<input type="file" id="uploaded_file" name="uploaded_file" required="">
										</div>
										</div> 

										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">How much would you like to sell it?</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="minimum_pay" placeholder="minimum" name="minimum_pay">
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label"></label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="maximum_pay" placeholder="maximum" name="maximum_pay">
											</div>
										</div>

										
										</div>
										</div>
										<button class="btn-danger" id="submit" name="submit">submit</button>
										
										
										
									</form>









								</div>
						</div>
					</div>
	


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
