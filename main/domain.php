

<?php
     require 'includes/storedb.php';
if(isset($_POST["submit"])){


    $target_dir = "uploads/";
    $domain_file = basename( $_FILES['uploaded_file']['name']);
    $target_file = $target_dir . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  


        $domain_url =htmlspecialchars( $_POST["domain_url"]);
        $domain_tagline =htmlspecialchars( $_POST["domain_tagline"]);
        $domain_desc =htmlspecialchars($_POST["domain_desc"]);
        $minimum_pay =htmlspecialchars($_POST["minimum_pay"]);
        $maximum_pay =htmlspecialchars($_POST["maximum_pay"]);
        $username =htmlspecialchars($_SESSION['username']);
        $status =htmlspecialchars($_POST["status"]);
        $reg_date = date("Y-m-d H:i:s");

 $sql = 'INSERT INTO domain (username, domain_url, domain_file, domain_tagline, domain_desc, status, minimum_pay, maximum_pay, reg_date) VALUES ("'.$username.'", "'.$domain_url.'","'.$domain_file.'","'.$domain_tagline.'","'.$domain_desc.'","pending","'.$minimum_pay.'","'.$maximum_pay.'", "'.$reg_date.'") ';
       
            if ($conn->query($sql) === TRUE) {
    
    $_SESSION['submit'] = true; header('LOCATION:package.php'); die();
} else {
	echo '<div class="alert alert-danger">';
    echo '<strong>Error!</strong> ' . $sql . "<br>" . $conn->error;;
    echo '</div>';
}



}



?>


<?php include 'includes/header.php'; ?>
				
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
									<form class="form-horizontal" action="domain.php" enctype="multipart/form-data" method="post" onSubmit=window.location='package.php'>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Site url</label>
											<div class="col-sm-8">
												<input type="url" class="form-control1" id="domain_url" placeholder="https://groovedevelopers.com" name="domain_url">
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Tagline</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="domain_tagline" placeholder="e.g Media Site" name="domain_tagline">
											</div>
										</div>
										<div class="form-group">
											<label for="description" class="col-sm-2 control-label">Description</label>
											<div class="col-sm-8"><textarea name="domain_desc" id="domain_desc" cols="50" rows="4" class="form-control1"></textarea></div>
										</div>
										
										<div class="form-group">
										<label for="exampleInputFile">Drop the Domain credentials here</label>
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
