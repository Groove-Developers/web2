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
							<h4>Create Topic</h4>
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">



									<?php
   require 'includes/forumdb.php';

if(isset($_POST["submit"])){

        $cat_id = $_GET["cat_id"];
        $title =htmlspecialchars( $_POST["title"]);
        $body =htmlspecialchars( $_POST["body"]);
        $username =htmlspecialchars($_SESSION['username']);
        $reg_date = date("Y-m-d H:i:s");

 $sql = 'INSERT INTO topics (username,title, body, cat_id, reg_date) VALUES ("'.$username.'","'.$title.'","'.$body.'","'.$cat_id.'","'.$reg_date.'") ';
       
            if ($con->query($sql) === TRUE) {
    $_SESSION['submit'] = true; header('LOCATION:fpost.php'); die();
} }else {
	?>
									<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Title</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="title" name="title" placeholder="Post Title" required="">
											</div>
										</div>
										<div class="form-group">
											<label for="tagline" class="col-sm-2 control-label">Body</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="body" name="body" placeholder="Post Body" required="">
											</div>
										</div>
										

										
										<button class="btn-danger" id="submit" name="submit">submit</button>
										
										
										
									</form>

<?php
}


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




 

