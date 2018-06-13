
<?php
ob_start();

?>


<?php

require 'includes/header.php';
?>
<link href="css/resCarousel.css" rel="stylesheet" type="text/css">
				<!--content-->
			<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
														<div class="panel-body">

<!-- bids -->					
         <div class="middle-content well">
<?php
require 'includes/projectdb.php';

if(isset($_POST["submit"])){

$bids =htmlspecialchars( $_POST["bids"]);
$project_id =htmlspecialchars($_GET["id"]);
$username =htmlspecialchars($_SESSION['username']);
$d_date = date("Y-m-d H:i:s");


$sql = "INSERT INTO bids (project_id, bids, username, d_date)
VALUES ('$project_id', '$bids', '$username', '$d_date')";

if ($con->query($sql) === TRUE) {
   $_SESSION['submit'] = true; header('LOCATION:bid.php'); die();
} }else {
	?>
	
<form action="" enctype="multipart/form-data" method="post">
<table>
    <tr>
      <th>Bid</th>
      <th></th>
      <th>Delivery Date</th>
      
      <th></th>
    </tr>
    <tr>
      <td><input type="text" name="bids" value="$"></td>
      <td></td>
      <td><input type="date" name="d_date" ></td>
      
      <td><button class="btn btn-danger" name="submit">Bid Now</button></td>
    </tr>
    
  </table>
</form>

<?php
   
}
?>
         </div>


         <!-- bids end-->


						
<!-- Project Details -->					
         <div class="middle-content well">



 <?php
	
	$sql = "SELECT id, project_name, minimum_price, maximum_price, project_cat, skills, project_desc FROM jobs ";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  
  $project_name = $row['project_name'];
  $id = $row['id'];
        ?>

<h3>Project Name:</h3>
<p><?php echo $row['project_name']; ?></p>


<h3>Project Description:</h3>
<p><?php echo $row['project_desc']; ?></p>

<h3>Skills Required:</h3>

<p><?php echo $row['skills']; ?></p>

<h3>Price Range:</h3>
<p>$<?php echo $row['minimum_price']; ?> - $<?php echo $row['maximum_price']; ?></p>

<p></p>

<?php
}
}

?>
         </div>

         <!-- Project Details end-->
						


						<!--view bids-->
						<div class="middle-content well">
		<table>
		<thead>
    <tr>
      <th>Developer Bidding</th>
      <th>Delivery Date</th>
      <th>Bid(USD)</th>
      <th>Developer's Portfolio</th>
      <th>Ratings / Reviews</th>
      
    </tr>
</thead>
<tbody>
 <?php
	
	$sql = "SELECT * FROM bids ";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  
 
        ?>

    <tr>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['d_date']; ?></td>
      <td><?php echo $row['bids']; ?></td>
<?php
}
}
$con->close();
?>
      <?php
require 'includes/usersdb.php';
      $sql = "SELECT id, dev_portfolios, rating  FROM other_dev_details WHERE username='".$_SESSION['username']."'";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  
 
        ?>
      <td>http://<?php echo $row['dev_portfolios']; ?></td>
      <td><?php echo $row['rating']; ?></td>
      <?php
}
}
$con->close();
?>
    </tr>
    </tbody>
  </table>




						</div>	
						<!--view bids ends-->
					

							
						<div class="clearfix"></div>

		

		
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


		    <script>
        //ResCarouselCustom();
        var pageRefresh = true;

        function ResCarouselCustom() {
            var items = $("#dItems").val(),
                slide = $("#dSlide").val(),
                speed = $("#dSpeed").val(),
                interval = $("#dInterval").val()

            var itemsD = "data-items=\"" + items + "\"",
                slideD = "data-slide=\"" + slide + "\"",
                speedD = "data-speed=\"" + speed + "\"",
                intervalD = "data-interval=\"" + interval + "\"";


            var atts = "";
            atts += items != "" ? itemsD + " " : "";
            atts += slide != "" ? slideD + " " : "";
            atts += speed != "" ? speedD + " " : "";
            atts += interval != "" ? intervalD + " " : ""

            //console.log(atts);

            var dat = "";
            dat += '<h4 >' + atts + '</h4>'
            dat += '<div class=\"resCarousel\" ' + atts + '>'
            dat += '<div class="resCarousel-inner">'
            for (var i = 1; i <= 14; i++) {
                dat += '<div class=\"item\"><div><h1>' + i + '</h1></div></div>'
            }
            dat += '</div>'
            dat += '<button class=\'btn btn-default leftRs\'><i class=\"fa fa-fw fa-angle-left\"></i></button>'
            dat += '<button class=\'btn btn-default rightRs\'><i class=\"fa fa-fw fa-angle-right\"></i></button>    </div>'
            console.log(dat);
            $("#customRes").html(null).append(dat);

            if (!pageRefresh) {
                ResCarouselSize();
            } else {
                pageRefresh = false;
            }
            //ResCarouselSlide();
        }

        $("#eventLoad").on('ResCarouselLoad', function() {
            //console.log("triggered");
            var dat = "";
            var lenghtI = $(this).find(".item").length;
            if (lenghtI <= 30) {
                for (var i = lenghtI; i <= lenghtI + 10; i++) {
                    dat += '<div class="item"><div class="tile"><div><h1>' + (i + 1) + '</h1></div><h3>Title</h3><p>content</p></div></div>'
                }
                $(this).append(dat);
            }
        });
    </script>
    <script src="js/resCarousel.js"></script>
</body>
</html>