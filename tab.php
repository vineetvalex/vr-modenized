<?php include("auth.php"); //include auth.php file on all secure pages 
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
		<li><a href="time.php">Time mangement</a></li>
		<li><a href="submit_emp.php">Submit Expense/Income</a></li>
		<li><a class="active" href="tab.php">Employee Tab</a></li>
		<li><a href="storeroom.php">Store Room</a></li>
		</ul>
		
		<div id="content" class="container_16 clearfix">
<h2 align="center" >Employee Tab Entry</h2>

 <center><form  action="" method="post">
                  
<div class="grid_15">
				<div class="box">
				<h1>Add to Tab</h1>
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
 <strong><label>Item Name:</label>  </strong>
 <?php
					date_default_timezone_set(America/Chicago);
					include('db.php');
					$query33 = "select item FROM stock";
					$result33 = mysql_query($query33);
					echo "<select name='item'>";
					if($result33){ 
					echo '<option></option>';
					while($row = mysql_fetch_array($result33)){
					//echo '<option value="'.$row['Field'].">".$row['Field'].'</option>';												
					echo "<option value=\"{$row['item']}\">".$row['item']."</option>";
					}
					echo '</select>'; 
					}
					
					?>
 
 <strong><label>Quantity:</label> </strong><input size="20" type="text" name="quantity" /><br/>
 </p></p></p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </div>
  </form>  
 <?php
  // connect to the database
 include('db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
  // get form data, making sure it is valid
  //echo $_POST['item'];
  $employee = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $item = mysql_real_escape_string(htmlspecialchars($_POST['item']));
 $quantity = mysql_real_escape_string(htmlspecialchars($_POST['quantity']));
 $curYear = date('Y');
   // check that product/cost/retail fields are both filled in
 if ($employee == '' || $item == '' || $quantity == '' || $quantity == '0')
 {
 // generate error message
 echo "<script type='text/javascript'>alert('Sorry did not record that. Please enter the item, quantity and name')</script>";
 }
 else
 {
 $result2 = mysql_query("select price from `stock` where `item` = '$item'");
					$row2 = mysql_fetch_array($result2);
					$price = $row2[0];	
 
 
 $percent = 10;

$discount= ($percent / 100) * $price;


$final_value = $price - $discount;
$actual_price = $final_value * $quantity;
$act_price = number_format($actual_price, 2);

 $current_date = date("m/d/Y");
 #echo $curret_date;
mysql_query("insert INTO tab (item, employee, quantity, date, price, act_price, year) VALUES ('$item', '$employee', '$quantity', '$current_date', '$price', '$act_price', '$curYear');")
 or die(mysql_error()); 


 // once saved, redirect back to the view page
echo "<script type='text/javascript'>alert('Add to tab Succesfully. WIll deduct from your next pay check. Also any report on purchases please check with the Owners')</script>";			 
							echo "<meta http-equiv=\"refresh\" content=\"0;\"/>";
 }
 }

?>	
 
  
 </div>
</div>
 </div>
</div> </div>
</div>

   
<!--footer-->
	
		<div id="foot">
										
	
					
				</div>
			</div>
		</div>
	</body>
</html>