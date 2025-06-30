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
		<title>KCS</title>
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
		<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
	</head>
	<body>

		<h1 id="head">KCS</h1>
		
		<ul id="navigation">
			<li><a href="dashboard.php">Inventory</a></li>
			<li><a  href="accounts.php">Accounts</a></li>							
			<li><a href="budget.php">Budget</a></li>
			<li><a class="active" href="report.php">Reporting</a></li>
			<li><a href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		
			<div id="content" class="container_16 clearfix">
<h2>Individual Annual report</h2>
				<div >
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
		 $now = new \DateTime('now');
	    $month = $now->format('m');
		$currentyear = $now->format('Y');
	    $monthName = date("F", mktime(null, null, null, $month));
		

		require('db.php');
		
		echo "<h2><center>Annual Report Generated for $year January to $currentyear $monthName</center></h2></p>";			
		$id = $_GET['id'];
		$result = mysql_query("SELECT * FROM inventory where id ='$id'") or die(mysql_error()); 
		$row = mysql_fetch_array( $result );
		$pledge = $row['pledge'];
		//echo "<h3> '$row['mname']' </h3>"; 
		echo '<a style="line-height:1.7"><u><font color="black"> Summary of Contributions</u></a> </br>';	
		echo '<a style="line-height:1.7"><font color="black">  Members:<strong>'; echo $row['product']; echo' Brand: '; echo $row['brand']; echo'</a> </strong> </br>';
				//echo '<a> Email:<strong>'; echo $row['email']; echo' </br> Email ';echo $row['semail']; echo'</a> </strong> </br>';
		//echo '<a> Contact:<strong>'; echo $row['contact']; echo' </br> Contact_Spouse'; echo $row['scontact']; echo'</a> </strong> </br>';
				
		}
		?>
		
		
		</p> </p>
		
		 <?php
if (isset($_POST['submit'])) {
$year = $_POST[year];
	// connect to the database
	include('db.php');
	
	// get results from database
	echo "<div id='table-wrapper'>";
 echo " <div id='table-scroll'>";
	echo "<div id='dvData'>";
	echo "<table width='200' border='1' cellpadding='2'>";
	$result1 = mysql_query("SELECT * FROM accounts where account_name != ''");
	
	
			while ($row = mysql_fetch_assoc($result1)) {
					
					echo "<tr>";					
					$account= $row['account_name'];
					$result2 = mysql_query("SELECT ROUND(SUM(amount), 2) FROM `received` WHERE `account` = '$account' AND `id` = '$id' AND `year` = '$year' ");
					$row2 = mysql_fetch_array($result2);
					$sum = $row2[0];					
					$total = $sum + $total;
					if (!empty($sum)) {
					echo "<th>";
					echo ($row['account_name']);
					echo "</th>";
					$result3 = mysql_query("SELECT ROUND(SUM(bill), 2) FROM `received` WHERE `account` = '$account' AND `id` = '$id' AND `year` = '$year' ");
					 $row3 = mysql_fetch_array($result3);
					 $sum3 = $row3[0];					
					 $total3 = $sum3 + $total3;
					echo "<th> $$sum"; echo"   "; echo " (Total $total3 Quantity sold)</th>";
				  echo "</tr>";
				  
				  	  }
				}
				

echo "<tr>";
echo "<th>TOTAL</th>";
echo "<th> $$total </th>";
 echo "</tr>";
 
	echo "</table>";
	
	echo "</div>";
	echo "</div>";
	echo "</div>";
	}	
?>
		
	</p></p>	
		
	</div>
	</div>
		<div id="foot">

				</div>
			</div>
		</div>
		</div>
		</div>
	</body>
