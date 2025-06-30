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
					'#content .grid_5, #content .grid_6', '#content .grid_7, #content .grid_8',
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
	<body>

		<h1 id="head">KCS</h1>
		
		<ul id="navigation">
			<li><a href="dashboard.php">Inventory</a></li>
			<li><a  href="accounts.php">Accounts</a></li>							
			<li><a href="budget.php">Budget</a></li>
			<li><a href="report.php">Reporting</a></li>
			<li><a class="active" href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
        <ul id="navigation">
		<li><a class="active" href="time.php">Time mangement</a></li>
				<li><a href="submit_emp.php">Submit Expense/Income</a></li>
				<li><a href="tab.php">Employee Tab</a></li>
				<li><a href="storeroom.php">Store Room</a></li>
		</ul>
		
		<div id="content" class="container_16 clearfix">
<h2 align="center" >KCS</h2>

 <center><form  action="" method="post">
                  
<div class="grid_8">
				<div class="box">
				<h1> Enter your data </h1>
				<label> Select YEAR (current year)</label> 
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
 <strong><label>Employee Name:</label> </strong>
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
 <strong><label>Hours Worked:</label> </strong><input size="20" type="text" name="hours" /><br/>
<strong><label>Job date :<span class="req">*</span> </label> </strong> <input type="text" name="date" id="datepicker" />
<strong><font size="3" color="red">Note: Enter the sales before you enter time.  Enter the numbers of kratom packed. On Quantity Packed just enter the number of Kilos Packed. Bonus will be calculated for you by the system</font></strong>
 <!--<strong><label>Bonus:</label> </strong><input size="20" type="text" name="bonus" /><br/> -->
 <strong><label>Quantity Packed:</label> </strong><input size="20" type="text" name="pack" /><br/>
  </p></p></p>
 <input type="submit" name="submit" value="Submit">
  </p></p></p> </p></p></p> </p></p></p>
 </div>
 </div>
  </form>  
 <?php
  // connect to the database
 include('db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
	$date = mysql_real_escape_string(htmlspecialchars($_POST['date']));
	$year = mysql_real_escape_string(htmlspecialchars($_POST['year']));

	$resultr = mysql_query("select ROUND(SUM(amount), 2) from `received` where `date` = '$date' and `account` = ' Sales_Revenue' and `year` = '$year'"); 
	$row1 = mysql_fetch_row($resultr);
	$perdayr = $row1[0];

	$resulte = mysql_query("select ROUND(SUM(amount), 2) from `expense` where `date` = '$date' and `account` = 'Sales_Tax_Collected' and `year` = '$year'");
	$row2 = mysql_fetch_row($resulte);
	$perdaye = $row2[0];

	$bamt = $perdayr - $perdaye;
	
	
	if ( $bamt >= 1000 && $bamt <= 1499 )
	{
        $bonus = 50;
	}
	elseif ($bamt >= 1500 && $bamt <= 1999)
	{
		$bonus = 75;
	}
	elseif ($bamt >= 2000 && $bamt <= 2499)
	{
		$bonus = 100;
	}
	elseif ($bamt >= 2500 && $bamt <= 2999)
	{
		$bonus = 125;
	}
	elseif ($bamt >= 3000 && $bamt <= 3499)
	{
		$bonus = 150;
	}
	elseif ($bamt >= 3500 && $bamt <= 3999)
	{
		$bonus = 175;
	}
	elseif ($bamt >= 4000 && $bamt <= 4499)
	{
		$bonus = 200;
	}
	else 
	{
		$bonus = 0;
	}

	

	ini_set("log_errors", 1);
	ini_set("error_log", "php-error.log");
	error_log( "$bonus --- bonus $bamt --- amt $perdayr ---rec $perdaye ---expe" );
	error_log(" $date -------  row1 end----  $year");

  // get form data, making sure it is valid
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $hours = mysql_real_escape_string(htmlspecialchars($_POST['hours']));
 #$bonus = mysql_real_escape_string(htmlspecialchars($bonus));
 $pack = mysql_real_escape_string(htmlspecialchars($_POST['pack']));
 
 
 
   // check that product/cost/retail fields are both filled in
 if ($name == '' || $hours == '' || $date == '' )
 {
 // generate error message
 echo "<script type='text/javascript'>alert('Sorry did not record that. Please enter the name, hours worked and date to record your pay')</script>";
 }
 else
 {
	 if ($hours < 10)
	 {
		 $bonus=0;
	}
 
 // save the data to the database
mysql_query("INSERT INTO employee (name, hours, date, bonus, pack, year) VALUES ('$_POST[name]', '$_POST[hours]', '$_POST[date]', '$bonus', '$_POST[pack]', '$_POST[year]');")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
echo "<script type='text/javascript'>alert(' Time Submitted Succesfully')</script>";			 
							echo "<meta http-equiv=\"refresh\" content=\"0;\"/>";
 }
 }

?>	
	 <center><form  action="" method="post">
<div class="grid_8">
				<div class="box">
				<h1> Check your data </h1>
				<label> Select YEAR (current year)</label> 
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
 <strong><label>Employee Name:</label> </strong>
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
 <input type="submit" name="submit1" value="Submit">
   </form>  
 <?php
  // connect to the database
 include('db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
  if (isset($_POST['submit1']))
 { 
  // get form data, making sure it is valid
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $sdate = mysql_real_escape_string(htmlspecialchars($_POST['sdate']));
 $edate = mysql_real_escape_string(htmlspecialchars($_POST['edate']));
 $year = mysql_real_escape_string(htmlspecialchars($_POST['year']));
  
   // check that product/cost/retail fields are both filled in
 echo "<h2>$name Summary from $sdate to $edate</h2>";	
  
echo "<table class='sortable'>";
     echo "<thead>";
      echo "<tr>";
        echo "<th>Employee</th>";
         echo "<th>Date Worked</th>";
          echo "<th>Hours</th>";
		  echo "<th>Bonus</th>";
		   echo "<th>Packing Pay</th>";
		   echo "<th>Total Pay</th>";
		  echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
       //$result2 = mysql_query("SELECT ROUND(SUM(hours), 2) FROM `employee` WHERE `date` >= '$sdate' AND `date` <= '$edate' ");
		//			$row2 = mysql_fetch_array($result2);
			//		$hours = $row2[0];	
      //$result3 = mysql_query("");
		//			$row3 = mysql_fetch_array($result3);
			//		$bonus = $row3[0];	
					
	$result = mysql_query("SELECT * FROM `employee` WHERE `name`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'"); 
          while( $row = mysql_fetch_assoc( $result ) ){
              echo "<tr>";
			  //$id=$row['id'];
			 // $nameresult= mysql_query("SELECT  `product` FROM  `inventory` WHERE  `id` =  '$id'");
			 // $namerow = mysql_fetch_array($nameresult);
			 // $name=$namerow[0];
            // echo " <td>$name</td>";
              echo "<td>$name</td>";
              echo "<td>{$row['date']}</td>";
              echo "<td>{$row['hours']}</td>";
              echo "<td>$"; echo"{$row['bonus']}</td> ";
			  $ppay = $row['pack'] * 5;
			   echo "<td>$"; echo"$ppay</td> ";
              echo "</tr>";
          
     }	


       $result2 = mysql_query("SELECT ROUND(SUM(hours)) FROM `employee` WHERE `name`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'");
					$row2 = mysql_fetch_array($result2);
					$hours = $row2[0];	
      $result3 = mysql_query("SELECT ROUND(SUM(bonus)) FROM `employee` WHERE `name`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'");
					$row3 = mysql_fetch_array($result3);
					$bonus = $row3[0];					
	      $result5 = mysql_query("SELECT ROUND(SUM(pack)) FROM `employee` WHERE `name`  =  '$name' AND `date` >= '$sdate' AND `date` <= '$edate' AND `year`='$year'");
					$row5 = mysql_fetch_array($result5);
					$pack = $row5[0];
                    $packpay = $pack * 5;				
		$result4 = mysql_query("SELECT payrate FROM `payrate` WHERE `name` = '$name'");			
					$row4 = mysql_fetch_array($result4);
					$payrate = $row4[0];
			$total = $hours * $payrate;
			$finaltotal = $total + $bonus + $packpay;
			 echo "<tr>";
			  echo "<td>----</td>";
              echo "<td>----</td>";
              echo "<td>----</td>";
              echo "<td>----</td> ";
              echo "<td>----</td>";
               echo "</tr>";
              echo "<tr>";
			  echo "<td>$name</td>";
              echo "<td>$sdate to $edate</td>";
              echo "<td>$hours</td> ";
              echo "<td>$";  echo "$bonus</td>";
			   echo "<td>$";  echo "$packpay</td>";
              echo "<td>$"; echo "$finaltotal</td>";	 
			 echo "</tr>";
			 echo "</table>";
}

echo "</div>";

?>	
 
  
 </div>
</div>
 </div>
</div> </div>
</div>
<!--footer-->
	
		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					<a href="#">Contact Me</a>
				</div>
			</div>
		</div>
	</body>
</html>