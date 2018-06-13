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
 

    $target_dir = "uploads/";
    $dev_doc = basename( $_FILES['uploaded_file']['name']);
    $target_file = $target_dir . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  
        $about_dev =htmlspecialchars($_POST["about_dev"]);
        $dev_top_skills =htmlspecialchars($_POST["dev_top_skills"]);
        $dev_portfolios =htmlspecialchars($_POST["dev_portfolios"]);
        $dev_lang =htmlspecialchars($_POST["dev_lang"]);
        $dev_other_skills =htmlspecialchars($_POST["dev_other_skills"]);
        $username =htmlspecialchars($_SESSION['username']);

  

$sql = "UPDATE other_dev_details SET username='$username', dev_doc='$dev_doc', about_dev='$about_dev', dev_top_skills='$dev_top_skills', dev_portfolios='$dev_portfolios', dev_lang='$dev_lang', dev_other_skills='$dev_other_skills'  WHERE  username = '" . $_SESSION['username'] . "' ";
   
if ($con->query($sql) === TRUE) {
   header('LOCATION:profile.php'); die();
} }else {



	//view php code


    	$username =htmlspecialchars($_SESSION['username']);
    	$sql = "SELECT username, dev_doc, about_dev, dev_top_skills, dev_portfolios, dev_lang, dev_other_skills FROM other_dev_details WHERE username='".$username."'";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}

    // output data of each row
    while($row = $result->fetch_assoc()) {
    	// view php code ends
  
  
        ?>

									<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">

										<div class="form-group">
										<label for="file" class="col-sm-2 control-label">Developers Document</label>
										<div class="col-sm-8">
										<input type="file" id="uploaded_file" name="uploaded_file" value=<?php echo $row['dev_doc']; ?> required="">
										</div>
										</div> 

										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">About Developer</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="about_dev" name="about_dev"  value=<?php echo $row['about_dev']; ?> >
											</div>
										</div>
										
									   <div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Developer Top Skills</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="dev_top_skills" name="dev_top_skills" placeholder="" value=<?php echo $row['dev_top_skills']; ?> >
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Developer Portfolios</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="dev_portfolios" placeholder="" name="dev_portfolios" value=<?php echo $row['dev_portfolios']; ?>>
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Developer Language</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="dev_lang" name="dev_lang" value=<?php echo $row['dev_lang']; ?>>
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Other Skills</label>
											<div class="col-sm-8">
										
												<input type="text" class="form-control1" id="dev_other_skills" name="dev_other_skills" value=<?php echo $row['dev_other_skills']; ?>>
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




 

