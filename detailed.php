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
			<li><a class="active" href="accounts.php">Accounts</a></li>							
			<li><a href="budget.php">Budget</a></li>
			<li><a href="report.php">Reporting</a></li>
			<li><a href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		<ul id="navigation">
		<li><a href="churchaccounts.php">Accouts Overview</a></li>
		<li><a href="submit.php">Submit Expense/Income</a></li>
		<li><a href="deposit.php">Submit Bank Deposit</a></li>
		<li><a href="withdraw.php">Submit Bank Withdrawal</a></li>
		<li><a class="active"  href="detailed.php">Detailed View</a></li>
		</ul>

			<div align="center"><br />
			<h3> Completed Report with Details</h3>
			<form action="" method="post" name="submit"> 
			<label>YEAR for INCOME report to generate </label> 
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
	// connect to the database
	include('db.php');
	$year = $_POST[year];
echo "<table>";
     echo "<thead>";
      echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>DATE</th>";
           echo " <th>Year</th>";
          echo "<th>Method</th>";
          echo "<th>Account</th>";
		  echo "<th>Amount</th>";
		  echo "<th>Quantity</th>";
		  echo "<th>Purpose</th>";
		  echo " <th>Descrition</th>";
        echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
       $result = mysql_query("select * from received where year='$year'"); 
          while( $row = mysql_fetch_assoc( $result ) ){
              echo "<tr>";
             echo " <td>{$row['id']}</td>";
              echo "<td>{$row['date']}</td>";
              echo "<td>{$row['year']}</td>";
              echo "<td>{$row['method']}</td>";
              echo "<td>{$row['account']}</td>";
              echo "<td>$"; echo"{$row['amount']}</td> ";
              echo "<td>{$row['bill']}</td>";
              echo "<td>{$row['received_for']}</td>";
              echo "<td>{$row['description']}</td> ";			  
            echo "</tr>";
          
     }
echo "</tbody>";
    echo "</table>";		
		}
		
        ?>
	


             <form action="" method="post" name="submit1"> 
			<label>YEAR for EXPENSE report to generate </label> 
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
					  <p><input  type="submit" name="submit1" value="submit" > </p> </form>
<?php
		if (isset($_POST['submit1'])) {
	// connect to the database
	include('db.php');
	$year = $_POST[year];
echo "<table>";
     echo "<thead>";
      echo "<tr>";
           echo "<th>DATE</th>";
           echo " <th>Year</th>";
          echo "<th>Method</th>";
          echo "<th>Account</th>";
		  echo "<th>Amount</th>";
		  echo "<th>Receipt Details</th>";
		  echo "<th>Purpose</th>";
		  echo " <th>Descrition</th>";
        echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
       $result = mysql_query("select * from expense where year='$year'"); 
          while( $row = mysql_fetch_assoc( $result ) ){
              echo "<tr>";
              echo "<td>{$row['date']}</td>";
              echo "<td>{$row['year']}</td>";
              echo "<td>{$row['method']}</td>";
              echo "<td>{$row['account']}</td>";
              echo "<td>$"; echo "{$row['amount']}</td> ";
              echo "<td>{$row['bill']}</td>";
              echo "<td>{$row['received_for']}</td>";
              echo "<td>{$row['description']}</td> ";			  
            echo "</tr>";
          
     }
echo "</tbody>";
    echo "</table>";		
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