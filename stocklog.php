<?php include("auth.php");?>


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
			$("#datepicker2").datepicker();
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
		<script src="js/sorttable.js"></script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>

		<h1 id="head">KCS</h1>
		
		<ul id="navigation">
			<li><a href="dashboard.php">Inventory</a></li>
			<li><a  href="accounts.php">Accounts</a></li>							
			<li><a href="budget.php">Budget</a></li>
			<li><a class="active"  href="report.php">Reporting</a></li>
			<li><a href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		<ul id="navigation">
		<li><a href="mon_report.php">Monthly Report</a></li>
		<li><a href="empreport.php">Employee Report</a></li>
		<li><a class="active" href="stocklog.php">Stock Activity</a></li>
		</ul>
<div id="content" class="container_16 clearfix">
<h2 align="center" >KCS</h2>

		
			
		<h3 id="head">Generate log for stock activity</h3>
		</br>
	<form action="" method="post" name="submit"> 	
			<strong><label>Start date  :<span class="req">*</span> </label> </strong> <input type="text" name="sdate" id="datepicker1" />
			<strong><label>End date :<span class="req">*</span> </label> </strong> <input type="text" name="edate" id="datepicker2" />
			
			</p></p></p>
 <input type="submit" name="submit" value="Submit"> </form>
  </p></p></p> 
  <?php
  // connect to the database
 include('db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 echo "<div class='grid_16'>";
 if (isset($_POST['submit']))
 { 
  // get form data, making sure it is valid
 $sdate = mysql_real_escape_string(htmlspecialchars($_POST['sdate']));
 $edate = mysql_real_escape_string(htmlspecialchars($_POST['edate']));
  
   // check that product/cost/retail fields are both filled in
  
   echo "<h2>Activity from $sdate to $edate</h2>";	
  
echo "<table class='sortable'>";
     echo "<thead>";
	       echo "<tr>";
        echo "<th>Item</th>";
         echo "<th>Date</th>";
          echo "<th>Action</th>";
		    echo "</tr>";
      echo "</thead>";
      $result = mysql_query("SELECT * FROM `stock_log` WHERE `date` >= '$sdate' AND `date` <= '$edate'"); 
          while( $row = mysql_fetch_assoc( $result ) ){
              echo "<tr>";
			  $date=$row['date'];
			  echo "<td>{$row['item']}</td>";
              echo "<td>{$row['date']}</td>";
              echo "<td>Quantity {$row['status']} is {$row['quantity']}</td>";
              echo "</tr>";
          
     }	
            
          
  echo "</table>";
}

echo "</div>";

?>	




		
			
			
 <!--<script src="https://en.lichess.org/embed?w=1016&h=650"></script> -->
		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					<a href="#">Contact Me</a>
				</div>
			</div>
		</div>
	</body>
</html>