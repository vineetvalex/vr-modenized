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
		<li><a  class="active" href="empreport.php">Employee Report</a></li>
		<li><a href="stocklog.php">Stock Activity</a></li>
		</ul>
<div id="content" class="container_16 clearfix">
<h2 align="center" >KCS</h2>

		<div class="grid_3>
				<div class="box">
			
		<h3>Generate Pay for employees</h3>
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
		<strong><label> Select the employee you need to Generate Report </label></strong>
				<?php
					date_default_timezone_set(America/Chicago);
					include('db.php');
					$query33 = "select name FROM payrate";
					$result33 = mysql_query($query33);
					echo "<select name='name'>";
					if($result33){ 
					echo '<option></option>';
					while($row = mysql_fetch_array($result33)){
					//echo '<option value="'.$row['Field'].">".$row['Field'].'</option>';												
					echo "<option value=\"{$row['name']}\">".$row['name']."</option>";
					}
					echo '</select>'; 
					}
					
					?>
					
			<strong><label>Start pay date :<span class="req">*</span> </label> </strong> <input type="text" name="sdate" id="datepicker1" />
			<strong><label>End pay date :<span class="req">*</span> </label> </strong> <input type="text" name="edate" id="datepicker2" />
			
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
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $sdate = mysql_real_escape_string(htmlspecialchars($_POST['sdate']));
 $edate = mysql_real_escape_string(htmlspecialchars($_POST['edate']));
 $year = mysql_real_escape_string(htmlspecialchars($_POST['year']));
  
   // check that product/cost/retail fields are both filled in
  
   echo "<h2>$name Wage Summary from $sdate to $edate</h2>";	
  
echo "<table class='sortable'>";
     echo "<thead>";
	       echo "<tr>";
        echo "<th>Employee</th>";
         echo "<th>Date Worked</th>";
          echo "<th>Hours</th>";
		  echo "<th>Bonus</th>";
		  echo "<th>Packing Pay</th>";
		   echo "<th>Total Sales (inc tax)</th>";
		  echo "<th>Total Pay</th>"; 
		  echo "</tr>";
      echo "</thead>";
      $result = mysql_query("SELECT * FROM `employee` WHERE `name`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'"); 
	  #$result = mysql_query("SELECT * FROM `employee` WHERE `name`  =  '$name' AND STR_TO_DATE(`date`, '%m/%d/%Y')BETWEEN '$sdate' AND '$edate' AND `year`='$year'"); 

		    
          while( $row = mysql_fetch_assoc( $result ) ){
              echo "<tr>";
			  
			  $date=$row['date'];
              echo "<td>$name</td>";
              echo "<td>{$row['date']}</td>";
              echo "<td>{$row['hours']}</td>";
              echo "<td>$"; echo"{$row['bonus']}</td> ";
			  $packpay = $row['pack'] * 5;
			   echo "<td>$"; echo"$packpay</td> ";
			  
			 $result5 =  mysql_query("SELECT ROUND(SUM(amount), 2) FROM `received` WHERE `account`  =  ' Sales_Revenue' AND `date`= '$date' AND `year`='$year'");
			 
			 
			 $row5 = mysql_fetch_array($result5);
			 $sales = $row5[0];
			 echo "<td>$sales</td>";
              echo "</tr>";
          
     }	

       $result2 = mysql_query("SELECT ROUND(SUM(hours)) FROM `employee` WHERE `name`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'");
					$row2 = mysql_fetch_array($result2);
					$hours = $row2[0];	
      $result3 = mysql_query("SELECT ROUND(SUM(bonus), 2) FROM `employee` WHERE `name`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'");
					$row3 = mysql_fetch_array($result3);
					$bonus = $row3[0];
$result5 = mysql_query("SELECT ROUND(SUM(pack)) FROM `employee` WHERE `name`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'");
					$row5 = mysql_fetch_array($result5);
					$pack = $row5[0];	
					$ppay = $pack * 5;
		$result4 = mysql_query("SELECT payrate FROM `payrate` WHERE `name` = '$name'");			
					$row4 = mysql_fetch_array($result4);
					$payrate = $row4[0];
			$total = $hours * $payrate;
			$finaltotal = $total + $bonus + $ppay;
			
	    		 
		 
		 
			 echo "<tr>";
			  echo "<td>----</td>";
              echo "<td>----</td>";
              echo "<td>----</td>";
              echo "<td>----</td> ";
              echo "<td>----</td>";
			  echo "<td>----</td>";
               echo "</tr>";
              echo "<tr>";
			  echo "<td>$name</td>";
              echo "<td>$sdate to $edate</td>";
              echo "<td>$hours</td> ";
              echo "<td>$"; echo"$bonus</td>";
			  echo "<td>$"; echo"$ppay</td>";
			  echo "<td>NA</td>";
              echo "<td>$"; echo "$finaltotal</td>";
			  
			 echo "</tr>";
          
  echo "</table>";
}

?>	

  <?php
  // connect to the database
 include('db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 echo "<div class='grid_16'>";
 if (isset($_POST['submit']))
 { 
  // get form data, making sure it is valid
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $sdate = mysql_real_escape_string(htmlspecialchars($_POST['sdate']));
 $edate = mysql_real_escape_string(htmlspecialchars($_POST['edate']));
 $year = mysql_real_escape_string(htmlspecialchars($_POST['year'])); 
  

   // check that product/cost/retail fields are both filled in
  
   echo "<h2>$name Tab Summary from $sdate to $edate</h2>";	
  
echo "<table class='sortable'>";
     echo "<thead>";
	       echo "<tr>";
        echo "<th>Employee</th>";
		echo "<th>Item Name</th>";
         echo "<th>Tab Date</th>";
          echo "<th>Price</th>";
		  echo "<th>Quantity</th>";
		   echo "<th>Total Price</th>";
		   echo "<th>Employee Price</th>";
		   echo "</tr>";
      echo "</thead>";
	  $result = mysql_query("SELECT * FROM `tab` WHERE `employee` =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year` = '$year'"); 

	  
	 	  $tot1 = array();
          while( $row = mysql_fetch_assoc( $result ) ){
              echo "<tr>";
			  $date=$row['date'];
			 // $nameresult= mysql_query("SELECT  `product` FROM  `inventory` WHERE  `id` =  '$id'");
			 // $namerow = mysql_fetch_array($nameresult);
			 // $name=$namerow[0];
            // echo " <td>$name</td>";
              echo "<td>$name</td>";
			  echo "<td>{$row['item']}</td>";
              echo "<td>{$row['date']}</td>";
			  echo "<td>$"; echo"{$row['price']}</td> ";
              echo "<td>{$row['quantity']}</td>";
			  $tot = $row['price'] * $row['quantity'];
			  echo "<td>"; echo "$"; echo "$tot</td>";
			  array_push($tot1, $tot);
              echo "<td>$"; echo"{$row['act_price']}</td> ";
			   echo "</tr>";
          
     }	

       $result1 = mysql_query("SELECT ROUND(SUM(act_price), 2) FROM `tab` WHERE `employee`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'");
					$row1 = mysql_fetch_array($result1);
					$finaltotal = $row1[0];	
		$result2 = mysql_query("SELECT ROUND(SUM(price), 2) FROM `tab` WHERE `employee`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'");
					$row2 = mysql_fetch_array($result2);
					$total = $row2[0];
          $result3 = mysql_query("SELECT ROUND(SUM(quantity), 2) FROM `tab` WHERE `employee`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'");
					$row3 = mysql_fetch_array($result3);
					$tot_qua = $row3[0];					
      
			
	    		 
		 
		 
			 echo "<tr>";
			  echo "<td>----</td>";
              echo "<td>----</td>";
              echo "<td>----</td>";
              echo "<td>----</td> ";
              echo "<td>----</td>";
			  echo "<td>----</td>";
               echo "</tr>";
              echo "<tr>";
			  echo "<td>$name</td>";
			  echo "<td>NA</td>";
              echo "<td>$sdate to $edate</td>";
              echo "<td>NA</td> ";
              echo "<td>$tot_qua</td>";
			  $tot2=array_sum($tot1);
			  $tax=$tot2 * 9.6 / 100;
			  $totax=$tot2 + $tax;
			 # echo "<td>$";echo array_sum($tot1);"</td> ";
			 echo "<td><pre> $"; echo array_sum($tot1); echo"<br/> $";
			 echo round($totax, 2); echo "(+tax)"; echo "</pre></td> ";
			   echo "<td>$"; echo "$finaltotal</td>";
			  
			 echo "</tr>";
          
  echo "</table>";
}

echo "</div>";

?>	
				</div>

			</div>

			</div>
			</div>
			</div>
			</div>
			
			
			
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