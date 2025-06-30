<?php include("auth.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="Keywords" content="flashmo_087_random, free templates, web templates, free flash template, flashmo.com" />
		<meta name="Description" content="flashmo_087_random is a free flash template from flashmo.com" />
		<title>St. Gregorios Orthodox Church</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="js/glow/1.7.0/core/core.js" type="text/javascript"></script>
		<script src="js/glow/1.7.0/widgets/widgets.js" type="text/javascript"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		  
		  <script>
		  $(document).ready(function() {
			$("#datepicker").datepicker();
			$("#datepicker1").datepicker();
			dateFormat: 'yy-mm-dd'
		  });
  </script>
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


<?php
		$year = $_POST[year];
		$id = $_POST[id];
		require('db.php');
		$email = "<a> <strong>ST Gregorios Orthodox Church Kansas City </br> Annual Report Generated for $year </strong></a> </p>";	 
		$result = mysql_query("SELECT * FROM family where id ='$id'") or die(mysql_error()); 
		$row = mysql_fetch_array( $result );
		$pledge = $row['pledge'];
		//echo "<h3> '$row['mname']' </h3>"; 
		echo '<a> <strong>'; echo $row['mname']; echo' & '; echo $row['spouse']; echo'</a> </strong> </br>';
		echo '<a> <strong>'; echo $row['address']; echo'</a> </strong> </br>';
		echo '<a> <strong>'; echo $row['email']; echo' & '; echo $row['semail']; echo'</a> </strong> </br>';
		echo '<a> <strong>'; echo $row['contact']; echo' & '; echo $row['scontact']; echo'</a> </strong> </br>';
		
		?>
		
		
		</p> </p>
		
		 <?php
		 $year = $_POST[year];
		$id = $_POST[id];
	include('db.php');
	echo "<div id='table-wrapper'>";
 echo " <div id='table-scroll'>";
	echo "<div id='dvData'>";
	echo "<table border='1' cellpadding='4'>";
	
	$result1 = mysql_query("SHOW COLUMNS FROM accounts");
	
	
			while ($row = mysql_fetch_assoc($result1)) {
					
					echo "<tr>";
					echo "<th>";
					print_r($row['Field']);
					echo "</th>";
					$account= $row['Field'];
					$result2 = mysql_query("SELECT SUM(amount) FROM `received` WHERE `account` = '$account' AND `id` = '$id' AND `year` = '$year'");
					$row2 = mysql_fetch_array($result2);
					$sum = $row2[0];					
					$total = $sum + $total;
					echo "<th> $$sum </th>";
				  echo "</tr>";
				}
echo "<tr>";
echo "<th>TOTAL</th>";
echo "<th> $$total </th>";
 echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	
?>
		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					<a href="#">Contact Me</a>
				</div>
			</div>
		</div>
	</body>
</html>