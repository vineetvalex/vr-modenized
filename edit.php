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
			<li><a class="active"  href="dashboard.php">Inventory</a></li>
			<li><a href="accounts.php">Accounts</a></li>							
			<li><a href="budget.php">Budget</a></li>
			<li><a href="report.php">Reporting</a></li>
			<li><a href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		
		<?php
 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id, $product, $brand, $supplier, $supplier_con, $cost, $retail, $stock)
 {
 ?>

 <?php 
 // if there are any errors, display them
 if ($error != '')
 {

 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <center><form  action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                  <div >
                    <div>
 <div> 

 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>ID:</label></strong> <?php echo $id; ?> <br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Product:</label> </strong><input size="65" type="text" name="product" value="<?php echo $product; ?>"/><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Brand:</label> </strong><input size="65" type="text" name="brand" value="<?php echo $brand; ?>"/><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Supplier:</label> </strong> <input size="65" type="text" name="supplier" value="<?php echo $supplier; ?>"/><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Supplier Contact:</label> </strong><input size="65" type="text" name="supplier_con" value="<?php echo $supplier_con; ?>"/><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Cost:</label> </strong><input size="65" type="text" name="cost" value="<?php echo $cost; ?>"/><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Retail:</label> </strong><input size="65" type="text" name="retail" value="<?php echo $retail; ?>"/><br/>
 <strong><label{text-align:right;clear: both;loat:left;margin-right:15px;}>Stock:</label> </strong><input size="65" type="text" name="stock" value="<?php echo $stock; ?>"/><br/>
 <input type="submit" name="submit" value="Submit">
 </div>
 </div>
 </div>
 </form> </center>
 </body>
 </html> 
 <?php
 }



 // connect to the database
 include('db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
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
  // check that firstname/lastname fields are both filled in
 if ($product == '' || $cost == '' || $retail == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in the required field (Product, Cost, Retail)!';
 
 //error, display form
 renderForm($id, $product, $brand, $supplier, $supplier_con, $cost, $retail, $stock);
 }
 else
 {
 // save the data to the database
mysql_query("UPDATE inventory SET product='$product', brand='$brand', supplier='$supplier', supplier_con='$supplier_con', cost='$cost', retail='$retail', stock='$stock' WHERE id='$id'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: dashboard.php"); 
 echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error! ID not Valid';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result = mysql_query("SELECT * FROM inventory WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
$product = $row['product'];
$brand = $row['brand'];
$supplier = $row['supplier'];
$supplier_con = $row['supplier_con'];
$cost = $row['cost'];
$retail = $row['retail'];
$stock = $row['stock'];
 
 // show form
 renderForm($id, $product, $brand, $supplier, $supplier_con, $cost, $retail, $stock);

 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error! ID not Valid n URL';
 }
 }
?>	
			
			



			


            </article>
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