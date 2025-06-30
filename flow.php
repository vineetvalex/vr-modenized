<?php include("auth.php"); //include auth.php file on all secure pages 
session_start();
$user = $_SESSION['username'];
if ( $user != 'admin' )
{
;
header("Location: ../vr/unauthorized_access.php");
exit(); }	
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="Keywords" content="flashmo_087_random, free templates, web templates, free flash template, flashmo.com" />
		<meta name="Description" content="flashmo_087_random is a free flash template from flashmo.com" />
		<title>KCS</title>
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
<script>
																function target_popup(form) {
																		window.open('', 'formpopup', 'width=800,height=800,resizeable,scrollbars');
																		form.target = 'formpopup';
																	}
</script>
		<h1 id="head">KCS</h1>
		
		<ul id="navigation">
			<li><a href="dashboard.php">Inventory</a></li>
			<li><a class="active" href="accounts.php">Accounts</a></li>
							
			<li><a href="budget.php">Budget</a></li>
			<li><a href="report.php">Reporting</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		<ul id="navigation">
		<li><a class="active" href="churchaccounts.php">Accouts Overview</a></li>
		<li><a href="submit.php">Submit Expense/Income</a></li>
		<li><a href="detailed.php">Detailed View</a></li>
		</ul>

 
 <div id="content" class="container_16 clearfix">
<h2>CHurch Accounts Summary</h2>
				<div class="grid_16">
				<form action="" method="post" name="submit"> 
		<label>YEAR for report generated </label> 
					<select name="year">
							<option value=></option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
					  </select><a> </p>
					  <p><input  type="submit" name="submit" value="submit" > </p> </form>
 <?php
if (isset($_POST['submit'])) {
$year = $_POST[year];
echo $year;
	// connect to the database
	include('db.php');
	
	// get results from database
	
	
	echo "<div id='table-wrapper'>";
    echo " <div id='table-scroll'>";
	echo "<div id='dvData'>";
	echo "<table border='1' cellpadding='4'>";
	echo "<tr></tr>";
	echo "<th>Month</th>";
	echo "<th>Income</th>";
	echo "<th>Expense</th>";
	echo "<th>Cash Trans (inc)</th>";
	echo "<th>Credit Trans (inc)</th>";
	echo "<th>Debit Trans (inc)</th>";
	echo "<th>Check Trans (inc)</th>";
	echo "<th>Auto Pay (inc)</th>";
	echo "<th>Sales Tax (inc)</th>";
	echo "<tr></tr>";
	
	//for ($m=1; $m<=12; $m++) {
   // $month = date('F', mktime(0,0,0,$m, 1, $year));
	//echo $array[$month]. ; 
	$months = array("January", "February", "March", "April", "May", "June", "July", " August", "September", "October", "November", "December");
   foreach ( $months  as $monthname ) {
     				echo "<tr>";
					
					echo "<th>";
					$month = date("m", strtotime($monthname));
					$startdate = "$month/01/$year";
					$enddate = "$month/31/$year";
						echo " <form action='cashflowdetails.php' method='post' onsubmit='target_popup(this)'>";
						echo "<input type='hidden' name='enddate' value='$enddate'/>";
						echo "<input type='hidden' name='year' value='$year'/>";
						echo "<input type='submit' name='month' value='$monthname'/>";
						echo "<input type='hidden' name='startdate' value='$startdate'/>";
						
						echo " </form>";
					//$month = date("m", strtotime($monthname));
					#$result2 = mysql_query("SELECT SUM(amount) FROM `received` WHERE `method` = 'cash' AND `year` = '$year'");
					$startdate = "$month/01/$year";
					$enddate = "$month/31/$year";
					$result2 = mysql_query("select SUM(amount) from `received` where date between '$startdate' and '$enddate' AND `year` = '$year'");
					$row2 = mysql_fetch_array($result2);
					$sum = $row2[0];					
					$total = $sum + $total;
					echo "<th> $$sum </th>";
					echo "</th>";

					$result3 = mysql_query("SELECT SUM(amount) FROM `expense` where date between '$startdate' and '$enddate' AND `year` = '$year'");
					$row3 = mysql_fetch_array($result3);
					$sum3 = $row3[0];					
					$total3 = $sum3 + $total3;
					echo "<th bgcolor='#FF0000' > $$sum3 </th>";				
					echo "</th>";
					
					$result4 = mysql_query("SELECT SUM(amount) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='cash'");
					$row4 = mysql_fetch_array($result4);
					$sum4 = $row4[0];					
					$total4 = $sum3 + $total4;
					echo "<th> $$sum4 </th>";				
					echo "</th>";
					
							
				 
				 $result5 = mysql_query("SELECT SUM(amount) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='credit'");
					$row5 = mysql_fetch_array($result5);
					$sum5 = $row5[0];					
					$total5 = $sum5 + $total5;
					echo "<th> $$sum5 </th>";				
					echo "</th>";
				
				 
				 $result6 = mysql_query("SELECT SUM(amount) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='debit'");
					$row6 = mysql_fetch_array($result6);
					$sum6 = $row6[0];					
					$total6 = $sum6 + $total6;
					echo "<th> $$sum6 </th>";				
					echo "</th>";
				 
				 $result7 = mysql_query("SELECT SUM(amount) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='check'");
					$row7 = mysql_fetch_array($result7);
					$sum7 = $row7[0];					
					$total7 = $sum7 + $total7;
					echo "<th> $$sum7 </th>";				
					echo "</th>";
				 
				 $result8 = mysql_query("SELECT SUM(amount) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='autopay'");
					$row8 = mysql_fetch_array($result8);
					$sum8 = $row8[0];					
					$total8 = $sum8 + $total8;
					echo "<th> $$sum8 </th>";				
					echo "</th>";
				 
				 $result9 = mysql_query("SELECT SUM(amount) FROM `expense` where date between '$startdate' and '$enddate' AND `year` = '$year' And `account`='Sales_tax'");
					$row9 = mysql_fetch_array($result9);
					$sum9 = $row9[0];					
					$total9 = $sum9 + $total9;
					echo "<th color='red'> $$sum9 </th>";				
					echo "</th>";				 
				 
				}
			echo "</tr>";		
	}	
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