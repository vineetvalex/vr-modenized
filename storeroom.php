<?php include("auth.php"); //include auth.php file on all secure pages 
session_start();
$user = $_SESSION['username'];
if ( $user == 'manager')
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
		<li><a href="tab.php">Employee Tab</a></li>
		<li><a class="active" href="storeroom.php">Store Room</a></li>
		</ul>
		
		<div id="content" class="container_16 clearfix">
<h2 align="center" >KCS STORE ROOM </h2>

 <center><form  action="" method="post">
                  
<div class="grid_8">
				<div class="box">
				<h1>Add to Store Room</h1>
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
 
 <strong><label>Quantity Added:</label> </strong><input size="20" type="text" name="qadd" /><br/>

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
 $item = mysql_real_escape_string(htmlspecialchars($_POST['item']));
 $qadd = mysql_real_escape_string(htmlspecialchars($_POST['qadd']));
 
 //echo $item, $qadd, $date_add;
  
  $cquantity = mysql_query("SELECT `quantity` FROM `stock` WHERE `item`  =  '$item'");
  $row2 = mysql_fetch_array($cquantity);
  $cquantity1 = $row2[0];
  
  $quantity = $cquantity1 + $qadd;
  
 
   // check that product/cost/retail fields are both filled in
 if ($item == '' || $qadd == '' )
 {
 // generate error message
 echo "<script type='text/javascript'>alert('Sorry did not record that. Please enter the item, quantity, added date ')</script>";
 }
 else
 {
 $current_date = date("m/d/Y");
mysql_query("insert INTO stock_log (item, quantity, date, status) VALUES ('$item', '$qadd', '$current_date', 'Added');")
or die(mysql_error());
mysql_query("UPDATE stock SET quantity = '$quantity' WHERE item = '$item';")
 or die(mysql_error()); 


 // once saved, redirect back to the view page
echo "<script type='text/javascript'>alert('Add to Stock room Succesfully')</script>";			 
							echo "<meta http-equiv=\"refresh\" content=\"0;\"/>";
 }
 }

?>	
	 <center><form  action="" method="post">
<div class="grid_8">
				<div class="box">
				
				<h1>Move to Store Front</h1>
 <strong><label>Item Name:</label> </strong>
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
 <strong><label>Quantity Removed:<span class="req">*</span> </label> </strong> <input size="20" type="text" name="qrem" /><br/>
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
 $item = mysql_real_escape_string(htmlspecialchars($_POST['item']));
 $qrem = mysql_real_escape_string(htmlspecialchars($_POST['qrem']));


$cquantity = mysql_query("SELECT `quantity` FROM `stock` WHERE `item`  =  '$item'");
  $row2 = mysql_fetch_array($cquantity);
  $cquantity1 = $row2[0];
  
  $quantity = $cquantity1 - $qrem;
  
 
   // check that product/cost/retail fields are both filled in
 if ($item == '' || $qrem == '' )
 {
 // generate error message
 echo "<script type='text/javascript'>alert('Sorry did not record that. Please enter the item, quantity')</script>";
 }
 else
 {
 
$current_date = date("m/d/Y");
mysql_query("insert INTO stock_log (item, quantity, date, status) VALUES ('$item', '$qrem', '$current_date', 'Removed');")
or die(mysql_error());
mysql_query("UPDATE stock SET quantity = '$quantity' WHERE item = '$item';")
 or die(mysql_error()); 


 // once saved, redirect back to the view page
echo "<script type='text/javascript'>alert('Removed and Added to Store Front Succesfully')</script>";			 
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
										
	 <b> <a href="store_add.php">Click Here</a> to add new inventory to Stock </b>	
	
	</p> </p>

	<strong><label><u>Items in Stock</u></label> </strong>	
			<?php
	include('db.php');
	
	// get results from database
	
	
	echo "<div id='table-wrapper'>";
 echo " <div id='table-scroll'>";
	echo "<div id='dvData'>";
	echo "<table class='sortable' border='3' cellpadding='4'>";
	echo "<tr></tr>";
	echo "<th>ITEM</th>";
	echo "<th>Available Quantity</th>";
	echo "<tr></tr>";
       					
	$result = mysql_query("SELECT * FROM `stock`"); 
          while( $row = mysql_fetch_assoc( $result ) ){
              echo "<tr>";
			  $item= $row['item'];
			  $quantity= $row['quantity'];
			  echo "<td>$item</td>";
			  echo "<td>$quantity</td>";
			   echo "</tr>";
	
	
          
     }	
	echo "</table>";
   echo "</div>";
	echo "</div>";
	echo "</div>";;	
					?>
					   
  </div> </div>
</div> 
		
					
					
					
				</div>
			</div>
		</div>
	</body>
</html>