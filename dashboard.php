<?php 
include("auth.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>KCZ</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="js/glow/1.7.0/core/core.js" type="text/javascript"></script>
		<script src="js/glow/1.7.0/widgets/widgets.js" type="text/javascript"></script>
		<link href="js/glow/1.7.0/widgets/widgets.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript">
			glow.ready(function(){
				new glow.widgets.Sortable(
					'#content .grid_5, #content .grid_6',
					{
						draggableOptions : {
							handle : 'h2'
						}
					}
				);
			});
		</script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>

		<h1 id="head">KCZ</h1>
		
		<ul id="navigation">
			<li><a class="active" href="dashboard.php">Inventory</a></li>
			<li><a  href="accounts.php">Accounts</a></li>							
			<li><a href="budget.php">Budget</a></li>
			<li><a href="report.php">Reporting</a></li>
			<li><a href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		
		<!--<div id="content" class="container_16 clearfix"> -->
		
       
	  <div id="4b" style="padding-left: 50px; padding-right: 50px; padding-top: 5px; padding-bottom: 5px;">
	  <h2>OUR Inventory</h2>
	   
	  <?php echo '<td class="edit"><a align="right" href="add.php?id=' . $row['id'] . '">Add New Inventory</a></td>';?>
	          <?php

	// connect to the database
	include('db.php');
	$year = date("Y");

	// get results from database
	 
	$result = mysql_query("SELECT * FROM inventory ORDER BY `id`") 
		or die(mysql_error());  
	
	//echo "<div id='table-wrapper'>";
 //echo " <div id='table-scroll'>";
	//echo "	<div id='dvData'>";
	echo "<table border='1' cellpadding='10'>";
	echo "<tr><th>ID</th> <th>Product & Model</th> <th>Brand</th> <th>Supplier</th> <th>Supplier Contact</th> <th>Cost</th> <th>Retail Price</th> <th>Stock</th> <th></th></tr>";

	 
	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
	$id = $row['id'];
	//$result2 = mysql_query("SELECT * FROM received where account='membership' and id='$id' and year='$year'");
	//if (mysql_num_rows($result2)==0)
	//{ 
    // $status = 'inactive';
	// }
	// else
	// {
	// $status = 'active';
	// }
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['product'] . '</td>';
		echo '<td>' . $row['brand'] . '</td>';
		echo '<td>' . $row['supplier'] . '</td>';
		echo '<td>' . $row['supplier_con'] . '</td>';
		echo '<td>' . $row['cost'] . '</td>';
		echo '<td>' . $row['retail'] . '</td>';
		echo '<td>' . $row['stock'] . '</td>';
		echo '<td class="edit"><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	
	
?>

		<!--<div class="grid_16">
			<?php 
			//include('db.php');
			//$year=date('Y');
			//$result = mysql_query("SELECT SUM(pledge_offered) FROM `inventory`");
			//$row = mysql_fetch_array($result);
			//$sum = $row[0];
			
			//$result2 = mysql_query("SELECT SUM(amount) FROM `received` WHERE `account` = 'Stewardship-Pledge' AND `year` = '$year'");
			//$row2 = mysql_fetch_array($result2);
			//$sum2 = $row2[0];					
			
			//echo "<a> Total offered Pledge :$$sum </a> </br>";
			//echo "<a> Total received Pledge :$$sum2 </a> </br>";			
			
			?>
			</div> -->
	
		<div id="foot">
			<div class="container_16 clearfix">
			
			
				
					<a href="#">Contact Me</a>
				</div>
			</div>
		</div>
	</body>
</html>