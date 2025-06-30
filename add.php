<?php include("auth.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>KCZ</title>
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
	</head>
	<body>

		<h1 id="head">KCZ</h1>
		
		<ul id="navigation">
			<li><a href="dashboard.php" class="active">Inventory</a></li>
			<li><a href="accounts.php">Accounts</a></li>
			<li><a href="budget.php">Budget</a></li>
			<li><a href="report.php">Reporting</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		
  
 <center><form  action="" method="post">
                  <div >
                    <div>
 <div> 

  <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Product:</label> </strong><input size="65" type="text" name="product" ><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Brand:</label> </strong><input size="65" type="text" name="brand" /><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Supplier:</label> </strong> <input size="65" type="text" name="supplier" /><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Supplier Contact:</label> </strong><input size="65" type="text" name="supplier_con" /><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Cost:</label> </strong><input size="65" type="text" name="cost" /><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Retail Price:</label> </strong><input size="65" type="text" name="retail"/><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Stock:</label> </strong><input size="65" type="text" name="stock"/><br/>
  <input type="submit" name="submit" value="Submit">
 </div>
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
 $id = $_POST['id'];
 $product = mysql_real_escape_string(htmlspecialchars($_POST['product']));
 $brand = mysql_real_escape_string(htmlspecialchars($_POST['brand']));
 $supplier = mysql_real_escape_string(htmlspecialchars($_POST['supplier']));
 $supplier_con = mysql_real_escape_string(htmlspecialchars($_POST['supplier_con']));
 $cost = mysql_real_escape_string(htmlspecialchars($_POST['cost']));
 $retail = mysql_real_escape_string(htmlspecialchars($_POST['retail']));
 $stock = mysql_real_escape_string(htmlspecialchars($_POST['stock']));
  // check that product/cost/retail fields are both filled in
 if ($product == '' || $cost == '' || $retail == '' )
 {
 // generate error message
 echo "<script type='text/javascript'>alert('mandatory Fileds Product, Cost and Retail Price')</script>";
 }
 else
 {
 // save the data to the database
mysql_query("INSERT INTO inventory (product, brand, supplier, supplier_con, cost, retail, stock) VALUES ('$_POST[product]', '$_POST[brand]', '$_POST[supplier]', '$_POST[supplier_con]', '$_POST[cost]', '$_POST[retail]', '$_POST[stock]');")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: dashboard.php"); 
 echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
 }
 }

?>	
        </div>
    </div>
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