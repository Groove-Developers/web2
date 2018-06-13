<?php
ob_start();

?>



 





<?php include 'includes/header.php'; ?>
				
				<!--content-->
			<div class="content">
<div class="women_main">
	<!-- start content -->
	<div class="faq">
	
	
	<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
							<h4>Edit Profile</h4>
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">



									<?php
	require '../db.php';

if(isset($_POST["submit"])){
 

      if(isset($_POST["submit"])){
  $target_dir = "uploads/";
    $dev_doc = basename( $_FILES['uploaded_file']['name']);
    $target_file = $target_dir . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }

        $about_dev =htmlspecialchars( $_POST["about_dev"]);
        $profile_img =htmlspecialchars( $_POST["profile_img"]);
        $dev_top_skills =htmlspecialchars( $_POST["dev_top_skills"]);
        $dev_portfolios =htmlspecialchars($_POST["dev_portfolios"]);
        $dev_lang =htmlspecialchars($_POST["dev_lang"]);
        $dev_other_skills =htmlspecialchars($_POST["dev_other_skills"]);
        $payment_mode =htmlspecialchars($_POST["payment_mode"]);
        $payment_mail =htmlspecialchars($_POST["payment_mail"]);
        $username =htmlspecialchars($_SESSION['username']);


        $target_dir = "uploads/";
    $profile_img = basename( $_FILES['upload_img']['name']);
    $target_file = $target_dir . basename( $_FILES['upload_img']['name']);
    if(move_uploaded_file($_FILES['upload_img']['tmp_name'], $target_file)) {
      echo "The file ".  basename( $_FILES['upload_img']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  


  $sql = "INSERT INTO other_dev_details (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} }else {

        ?>

									<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
										<div class="form-group">
										<label for="exampleInputFile">Profile Image</label>
										<div class="col-sm-8">
										<input type="file" id="upload_img" name="upload_img" >
										</div>
										</div> 
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Top Skills</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="dev_top_skills" name="dev_top_skills" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Other Skills</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="dev_other_skills" name="dev_other_skills" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="description" class="col-sm-2 control-label">About Developer</label>
											<div class="col-sm-8"><textarea name="about_dev" id="about_dev" cols="50" rows="4" class="form-control1" > </textarea></div>
										</div>

										<div class="form-group">
										<label for="exampleInputFile">Developers document</label>
										<div class="col-sm-8">
										<input type="file" id="uploaded_file" name="uploaded_file" >
										</div>
										</div> 
										

										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Portfolios Link</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="dev_portfolios" name="dev_portfolios" placeholder="Your Portfolios link" >
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Developers Language</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="dev_lang" placeholder="" name="dev_lang">
											</div>
										</div>

										<h3><b>Payment</b></h3>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Payment Mode</label>
											<div class="col-sm-8">
												<select class="form-control" name="payment_mode" id="payment_mode"  />
<option>Select </option>
<option value="paypal">Paypal</option>
<option value="payeer">Payeer</option>

</select>
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Payment Mail</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="payment_mail" placeholder="e.g money@payment.com" name="payment_mail" required="">
											</div>
										</div>

										
										</div>
										</div>
										<button class="btn-danger" id="submit" name="submit">submit</button>
										
										
										
									</form>






<?php
}
}
$con->close();
?>
	








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




 

