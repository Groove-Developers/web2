
<?php
require 'includes/header.php';

$cat_id = $_GET["id"];
require 'includes/forumdb.php';
?>



				<!--content-->
			<div class="content">
<div class="women_main">
	<!-- start content -->
   <div class="w_content">
		<div class="women">
			<a href="#"><h4>Topics - <span>4449 items</span> </h4></a>
			<ul class="w_nav">
						
		     			<li><?php echo '<a href="ctopic.php?cat_id='.$cat_id.'">';?>Create Topic</a></li> 
		     			<div class="clear"></div>	
		     </ul>
		     <div class="clearfix"></div>	
		</div>






		
		<!-- grids_of_4 -->
		<div class="grids_of_4">
		
        <div class="container-fluid bg-3 text-center">

		 <div class="row">
		 		  <?php
	


                        

                      

	$sql = "SELECT cat_id, title, body, username, topic_id FROM topics WHERE cat_id='".$cat_id."'";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$topic_id = $row['topic_id'];
  
  
        ?>
				<div class="col-sm-3 well" style="float: left;">
				    <h4><?php echo $row['title']; ?></h4>
				    <p><?php echo $row['username']; ?></p>
				     <p><?php echo $row['body']; ?></p>
				     <div class="item_add"><span class="item_price"><?php echo '<a href="viewp.php?topic_id='.$topic_id.'">';?>join</a></span></div>
			   	</div>
			
						<?php
}}
$con->close();
?>
	
			</div>
			</div>

	

			<div class="clearfix"></div>
		</div>

	
		

			<?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 16;
        $offset = ($pageno-1) * $no_of_records_per_page;

        require 'includes/forumdb.php';
        $total_pages_sql = "SELECT COUNT(*) FROM topics";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM topics LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        }
        mysqli_close($con);
    ?>
    <ul class="pager">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
		


		</div>
		
		
		
		
		<!-- end grids_of_4 -->
		
		
	</div>
   <div class="clearfix"></div>
	<!-- end content -->


	<!--footer-->
	<?php include 'includes/footer.php'; ?>
				<!--footer ends-->




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