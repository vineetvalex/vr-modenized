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
			<li><a  href="accounts.php">Accounts</a></li>							
			<li><a href="budget.php">Budget</a></li>
			<li><a class="active" href="report.php">Reporting</a></li>
			<li><a href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
				<ul id="navigation">
		<li><a class="active"  href="mon_report.php">Monthly Report</a></li>
		<li><a  href="empreport.php">Employee Report</a></li>
		<li><a href="stocklog.php">Stock Activity</a></li>
		</ul>
		
		 
 <div id="content" class="container_16 clearfix">
<h2>KCS Accounts Summary</h2>
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
	echo "<th>Auto Pay</th>";
	echo "<th>Sales Tax</th>";
	echo "<th>Total Cash (hand)</th>";
	echo "<th>Total Profit</th>";
	echo "<th>AVG per day</th>";
	echo "<tr></tr>";
	
	//for ($m=1; $m<=12; $m++) {
   // $month = date('F', mktime(0,0,0,$m, 1, $year));
	//echo $array[$month]. ; 
	$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
   foreach ( $months  as $monthname ) {
     				echo "<tr>";
					
					echo "<th>";
					#$monthconvert = date_parse('$monthname');
					#$month = $monthconvert['month']);
					#$m = array("January"=>01, "February"=>02, "March"=>03, "April"=>04, "May"=>05, "June"=>06, "July"=>07, " August"=>08, "September"=>09, "October"=>10, "November"=>11, "December"=>12);
					#$month = $m[$monthname];
					#$month = date("m", strtotime($monthname));
if($monthname == 'January')
{
$month = "01";
}else
if($monthname == 'February')
{
$month = "02";
 
}else
if($monthname == 'March')
{
$month = "03";
 
}else
if($monthname == 'April')
{
$month = "04";
 
}else
if($monthname == 'May')
{
$month = "05";
 
}else
if($monthname == 'June')
{
$month = "06";
}else
if($monthname == 'July')
{
$month = "07";
}else
if($monthname == 'August')
{
$month = "08";
}else
if($monthname == 'September')
{
$month = "09";
}else
if($monthname == 'October')
{
$month = "10";
}else
if($monthname == 'November')
{
$month = "11";
}else
if($monthname == 'December')
{
$month = "12";
}
					#echo $month;
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
					$result2 = mysql_query("select ROUND(SUM(amount), 2) from `received` where date between '$startdate' and '$enddate' AND `year` = '$year'");
					$row2 = mysql_fetch_array($result2);
					$sum = $row2[0];					
					echo "<th> $$sum </th>";
					echo "</th>";
 #excluding profit share
					$result3 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `expense` where date between '$startdate' and '$enddate' AND `year` = '$year' AND `account` != ' Profit_Share_Remil' AND `account` != ' Profit_Share_Smithu';");
					$row3 = mysql_fetch_array($result3);
					$sum3 = $row3[0];					
					echo "<th> $$sum3 </th>";				
					echo "</th>";
					
										
					$result4 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='cash'");
					$row4 = mysql_fetch_array($result4);
					$sum4 = $row4[0];					
					$result4a = mysql_query("SELECT ROUND(SUM(bill), 2) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='cash'");
					$row4a = mysql_fetch_array($result4a);
					$sum4a = $row4a[0];					
					echo "<th> $$sum4 ($sum4a) </th>";				
					echo "</th>";
					
							
				 
				 $result5 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='credit'");
					$row5 = mysql_fetch_array($result5);
					$sum5 = $row5[0];					
					echo "<th> $$sum5 </th>";				
					echo "</th>";
				
				 
				 $result6 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='debit'");
					$row6 = mysql_fetch_array($result6);
					$sum6 = $row6[0];					
					echo "<th> $$sum6 </th>";				
					echo "</th>";
				 
				 $result7 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='check'");
					$row7 = mysql_fetch_array($result7);
					$sum7 = $row7[0];					
					echo "<th> $$sum7 </th>";				
					echo "</th>";
				 
				 $result8 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='autopay'");
					$row8 = mysql_fetch_array($result8);
					$sum8 = $row8[0];					
					echo "<th> $$sum8 </th>";				
					echo "</th>";
				 
				 $result9 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `expense` where date between '$startdate' and '$enddate' AND `year` = '$year' And `account`='Sales_Tax_Collected'");
					$row9 = mysql_fetch_array($result9);
					$sum9 = $row9[0];					
					echo "<th> $$sum9 </th>";				
					echo "</th>";
					
				$result10 = mysql_query("SELECT ROUND(SUM(bill), 2) FROM `received` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='cash'");
					$row10 = mysql_fetch_array($result10);
					$sum10 = $row10[0];					
				$result11 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `expense` where date between '$startdate' and '$enddate' AND `year` = '$year' And `method`='cash'");	
				$row11 = mysql_fetch_array($result11);
					$sum11 = $row11[0];	
					$total11= $sum10 - $sum11;
					echo "<th> $$total11 </th>";				
					echo "</th>";		
			
				 									 
				 $totalpro= $sum - $sum3;
					echo "<th> $$totalpro </th>";				
					echo "</th>";	
					
				 $result12 = mysql_query("select ROUND(SUM(amount), 2) from `received` where date between '$startdate' and '$enddate' AND `year` = '$year'");
					$row12 = mysql_fetch_array($result12);
					$sum12 = $row12[0];					
					$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);	
					$avground = $sum12 / $days;
					$avg = round ($avground, 2);
					echo "<th> $$avg </th>";
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