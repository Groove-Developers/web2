

<?php
ob_start();
?>
<?php include 'includes/header.php'; 
?>

				
				<!--content-->
			<div class="content">
<div class="women_main">
	<!-- start content -->
	<div class="faq">
	


<div class="container">
	
	 <?php
	require 'includes/forumdb.php';

$topic_id = $_GET["topic_id"];
	$sql = "SELECT cat_id, title, body, username FROM topics WHERE topic_id='".$topic_id."'";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  
  
        ?>
        <div class="progressbar-heading general-heading text-center">
							<h4><?php echo $row['title']; ?></h4>
							 <p><b>Created by</b>: <?php echo $row['username']; ?></p>
						</div>

				   
				     <p><?php echo $row['body']; ?></p>

				     <?php
}}

?>
</div>






						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">




 <div class="col-sm-8 well">
								  
								  	
								   	<?php
											

$sql = "SELECT username, topic_id, body, reply_id FROM replies WHERE topic_id='".$topic_id."' ORDER BY reply_id  ";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}

    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
        ?>
										

										
										<p><b><?php echo $row['username']; ?></b>: <?php echo $row['body']; ?></p>
										
										<hr>
										<?php  }

                                    
                                      ?>		

	


	<?php
		require 'includes/forumdb.php';											
  
   if (isset($_REQUEST['submit'])){
		$body = stripslashes($_REQUEST['body']);
		$body = mysqli_real_escape_string($con,$body);
        $topic_id = $_GET["topic_id"];
        $username =htmlspecialchars($_SESSION['username']);
        $reg_date = date("Y-m-d H:i:s");


        $query = "INSERT into replies (body, topic_id, username, reg_date) VALUES ('$body', '$topic_id', '$username', '$reg_date') ";
        $result = mysqli_query($con,$query);
        //check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}
        if($result){
            $_SESSION['submit'] = true; header('LOCATION:viewp.php'); die();
        }
    }else{
    	?>
    	<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
										
										<div class="form-group">
											<label for="description" class="col-sm-2 control-label">Comment</label>
											<div class="col-sm-8"><textarea name="body" id="body" cols="50" rows="4" class="form-control1" required=""></textarea></div>
										</div>
										

										
										<button class="btn-danger" id="submit" name="submit">Submit</button>
										
										
										
									</form>
							<?php
 }
 $con->close();?>



										</div>




	





<div class="clearfix"></div>





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




 

