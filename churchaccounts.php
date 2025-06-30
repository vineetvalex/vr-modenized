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
			<li><a href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		<ul id="navigation">
		<li><a class="active" href="churchaccounts.php">Accouts Overview</a></li>
		<li><a href="submit.php">Submit Expense/Income</a></li>
		<li><a href="deposit.php">Submit Bank Deposit</a></li>
		<li><a href="withdraw.php">Submit Bank Withdrawal</a></li>
		<li><a  href="detailed.php">Detailed View</a></li>
		
		</ul>

 
 <div id="content" class="container_16 clearfix">
<h2>Accounts Summary</h2>
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
	echo "<th>Account</th>";
	echo "<th>Income</th>";
	echo "<th>Expense</th>";
	echo "<tr></tr>";
	$result1 = mysql_query("SELECT * FROM accounts where account_name != ''");
	
					
			while ($row = mysql_fetch_assoc($result1)) {
					
					echo "<tr>";
					
					echo "<th>";
					$account_name = $row['account_name'];
						echo " <form action='acctdetails.php' method='post' onsubmit='target_popup(this)'>";
						echo "<input type='submit' name='account_name' value='$account_name'/>";
						echo "<input type='hidden' name='year' value='$year'/>";
						echo " </form>";
						
				
											
					echo "</th>";
					$account= $row['account_name'];
					$result2 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `received` WHERE `account` = '$account' AND `year` = '$year'");
					$row2 = mysql_fetch_array($result2);
					$sum = $row2[0];					
					$total = $sum + $total;
					echo "<th> $$sum </th>";
					echo "</th>";
					$account= $row['account_name'];
					$result2 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `expense` WHERE `account` = '$account' AND `year` = '$year'");
					$row3 = mysql_fetch_array($result2);
					$sum3 = $row3[0];					
					$total3 = $sum3 + $total3;
					echo "<th> $$sum3 </th>";
					
				  echo "</tr>";
				}
echo "<tr>";
echo "<th>TOTAL</th>";
echo "<th> $$total </th>";
echo "<th> $$total3 </th>";
 echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
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