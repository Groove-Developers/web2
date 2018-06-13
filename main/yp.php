
<?php
ob_start();

?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

require 'includes/header.php';
?>
				<!--content-->
			<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							
							<div class="panel-body">





								


								<div class="contain">	

									<!--tracker-->

									<!--progress bar-->
<div class="container">
    <div class="row">
    	
        
    
</div>
</div><br>
<!--progress end-->


									<!--tracker ends-->
							   <div class="middle-content">
									<h3>Jobs
									</h3>

        
   
									
	<table class="data-table">
		<thead>
		<tr>
			<th>Product Name</th>
			<th>Category</th>
			<th>Edit</th>
			<th>Status</th>
			<th>Start Date</th>
			<th>Due Date</th>
			<th>View Project</th>
		</tr>
		</thead>
	

									

	<tbody>
	


<?php
require 'includes/projectdb.php';
$sql = "SELECT id, username, project_name, project_cat, status, start_date, due_date FROM developers_project WHERE username = '" . $_SESSION['username'] . "' ORDER BY id DESC LIMIT 10 ";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}

    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$id = $row['id'];
        ?>

        <tr>
                <td><?php echo $row['project_name']; ?></td>
                <td><?php echo $row['project_cat']; ?></td>
                <td><?php echo '<a href="eproject.php?id='.$id.'">';?><button type="button" class="btn btn-success">edit</button></a></td>
                <td><?php echo $row['status']; ?></td>
                 <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['due_date']; ?></td>
                <td><?php echo '<a href="vp.php?id='.$id.'">';?><button type="button" class="btn btn-danger">view</button></a>
                </td>
            </tr>
            <?php  }

$con->close();
?>

	</tbody>
	</table>



      
    
    
    


										
								</div>
									
                               

<div class="middle-content">
									<h3>Projects
									</h3>

        
   
									
	<table class="data-table">
		<thead>
		<tr>
			<th>Product Name</th>
			<th>Category</th>
			<th>Edit</th>
			<th>Status</th>
			<th>Start Date</th>
			<th>Due Date</th>
			<th>View Project</th>
		</tr>
		</thead>
	

									

	<tbody>



<?php
require 'includes/projectdb.php';
$sql = "SELECT id, username, project_name, project_cat, status, start_date, due_date FROM users_project WHERE username = '" . $_SESSION['username'] . "' ORDER BY id DESC LIMIT 10 ";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}

    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$id = $row['id'];
        ?>

        <tr>
                <td><?php echo $row['project_name']; ?></td>
                <td><?php echo $row['project_cat']; ?></td>
                <td><?php echo '<a href="eproject.php?id='.$id.'">';?><button type="button" class="btn btn-success">edit</button></a></td>
                <td><?php echo $row['status']; ?></td>
                 <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['due_date']; ?></td>
                <td><?php echo '<a href="vp.php?id='.$id.'">';?><button type="button" class="btn btn-danger">view</button></a>
                </td>
            </tr>
            <?php  }

$con->close();
?>

	</tbody>
	</table>



      
    
    
    


										
								</div>

								</div>
								
							</div>
						</div>
					</div>

			
						
							

							
						<div class="clearfix"></div>

						<!-- New Project-->
						
					

		
			
	
		 



		
		<?php include 'includes/footer.php'; 
		include 'includes/sidebar.php';?>
				<!--//content-inner-->
			<!--/sidebar-menu-->
			
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