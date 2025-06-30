<?php include("auth.php"); //include auth.php file on all secure pages 
session_start();
$user = $_SESSION['username'];
if ( $user != 'admin' )
{
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

		<h1 id="head">KCS</h1>
		
		<ul id="navigation">
			<li><a href="dashboard.php">Inventory</a></li>
			<li><a href="accounts.php">Accounts</a></li>							
			<li><a class="active" href="budget.php">Budget</a></li>
			<li><a href="report.php">Reporting</a></li>
			<li><a href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		

 
 <div id="content" class="container_16 clearfix">
<h2 align="center" >Budget</h2>

<b>Ready to enter Budget for current year <?php echo date("Y"); ?></b>
 
 <b> <a href="budget_edit.php">Click Here</a> to enter the budget for current year </b>
 </p>
<b> <a href="budget_edit_prev.php">Click Here</a> to enter the budget for previous year</b>
 </p>
 </p></p>

				<div class="grid_16">
				<form action="" method="post" name="submit"> 
				

				<h3> Generate Budget Report </h3>
		<label>YEAR for the Budget Report to be generated </label> 
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
	echo "<th>Actual Income</th>";
	echo "<th>Actual Expense</th>";
	echo "<th>Budgeted Income</th>";
	echo "<th>Budgeted Expense</th>";
	echo "<tr></tr>";
	$result1 = mysql_query("select kc_acct from accounts where kc_acct != ''");
	
		while ($row = mysql_fetch_assoc($result1)) {
					
					echo "<tr>";
					
					echo "<th>";
					print_r($row['kc_acct']);
					echo "</th>";
					$account= $row['kc_acct'];
					$result2 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `received` WHERE `account` = '$account' AND `year` = '$year'");
					$row2 = mysql_fetch_array($result2);
					$sum = $row2[0];					
					$total = $sum + $total;
					echo "<th> $$sum </th>";
					echo "</th>";
					$account= $row['kc_acct'];
					$result3 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `expense` WHERE `account` = '$account' AND `year` = '$year'");
					$row3 = mysql_fetch_array($result3);
					$sum3 = $row3[0];					
					$total3 = $sum3 + $total3;
					echo "<th> $$sum3 </th>";
					echo "</th>";
					$account= $row['kc_acct'];
					$result4 = mysql_query("SELECT income FROM `budget` WHERE `account` = '$account' AND `year` = '$year'");
					$row4 = mysql_fetch_array($result4);
					$sum4 = $row4[0];					
					$total4 = $sum4 + $total4;
					echo "<th> $$sum4 </th>";
					echo "</th>";
					$account= $row['kc_acct'];
					$result5 = mysql_query("SELECT expense FROM `budget` WHERE `account` = '$account' AND `year` = '$year'");
					$row5 = mysql_fetch_array($result5);
					$sum5 = $row5[0];					
					$total5 = $sum5 + $total5;
					echo "<th> $$sum5 </th>";
				  echo "</tr>";
				}
#########################Bank Balance#####################
echo "<tr>";
$openu = mysql_query("SELECT ROUND(SUM(usbank), 2) FROM `budget` WHERE `year` = '$year'");
$rowu = mysql_fetch_array($openu);
$openus = $rowu[0];

$totalincomeu = $openus+$total;
//echo $totalincome;
$totalexpenseu = $totalincomeu-$total3;


echo "<th> US Bank Balance : $totalexpenseu </th>";

echo "<th>---</th>";
echo "<th>---</th>";
echo "<th>---</th>";
echo "<th>---</th>";
echo "</tr>";
###############CASH in HAND##########
for ($i = $year; $i >= 2017; $i--){


                    $result10 = mysql_query("SELECT ROUND(SUM(bill), 2) FROM `received` where `method`='cash' and `year` = '$i'");
					$row10 = mysql_fetch_array($result10);
					$sum10 = $row10[0];					
					$result11 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `expense` where `method`='cash' and `year` = '$i'");	
					$row11 = mysql_fetch_array($result11);
					$sum11 = $row11[0];	
					$total11= $sum10 - $sum11;
					$result121 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `bankdeposit` where `year` = '$i'");
					$row121 = mysql_fetch_array($result121);
					$sum121 = $row121[0];
					
					$result122 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `bankwithdraw` where `year` = '$i'");
					$row122 = mysql_fetch_array($result122);
					$sum122 = $row122[0];
					
					
					$totalcash = $total11 + $sum122 - $sum121;
					$finalcash += $totalcash;

					echo "<tr>";
					echo "<th> $i cash in hand  : $totalcash </th>";
					echo "<th>---</th>";
					echo "<th>---</th>";
					echo "<th>---</th>";
					echo "<th>---</th>";
					echo "</tr>";

}
echo "<tr>";
echo "<th> TOTAL CASH IN HAND (FINAL) : $finalcash </th>";
echo "<th>---</th>";
echo "<th>---</th>";
echo "<th>---</th>";
echo "<th>---</th>";
echo "</tr>";

#####################################



echo "<tr>";
echo "<th>TOTAL</th>";
echo "<th> $$total </th>";
echo "<th> $$total3 </th>";
echo "<th> $$total4 </th>";
echo "<th> $$total5 </th>";
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