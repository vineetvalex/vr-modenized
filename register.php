<?php include("auth.php"); //include auth.php file on all secure pages 
session_start();
$user = $_SESSION['username'];
if ( $user != 'admin' )
{
;
header("Location: ../vr/unauthorized_access.php");
exit(); }	
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>KCS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
		<style>
form { display: inline; }
</style>
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
		<li><a class="active" href="submit.php">Submit Expense/Income</a></li>
		<li><a href="deposit.php">Submit Bank Deposit</a></li>
		<li><a href="detailed.php">Detailed View</a></li>
		</ul>

			<div id="content" class="container_16 clearfix">
				<div class="grid_5">
					<div class="box">
						  
          <h2>Sales</h2> </p>
		 <?php  if (isset($_POST['product'])) {
		  
		  $product = $_POST[product];
		  include('db.php');
					$query4 = "select * FROM inventory where product='$product'";
					$result4 = mysql_query($query4);
					$row = mysql_fetch_array($result4);
					$retail = $row['retail'];
					echo " <form action='' method='post' name='submit'>	";
          
		  echo ' <label>Product<span class="req">*</span></label> ';
              echo ' <input type="text" name="product" value="'.$row['product'].'" required/>';
			 echo '<label>Amount<span class="req">*</span></label>';
           echo '    <input type="text" name="amount" value="'.$row['retail'].'" required />';
		 echo '<label>Quantity<span class="req">*</span></label>';			  
			 echo '  <input type="number" name="quantity" min="1" max="50" placeholder="" required autocomplete="off"/> </p>'; 
			 echo "<input type='submit' name='cart' value='Add to Cart'/>";				 
			 echo "</form>";
			 
		  }
		  
		  
		  
		  else
		  { ?>
		  
		  <label>Product<span class="req">*</span></label>
              <input type="text" name="product" placeholder="" required autocomplete="off" />
			<label>Amount<span class="req">*</span></label>
              <input type="text" name="amount" placeholder="" required autocomplete="off" />
		<label>Quantity<span class="req">*</span></label>
			  
			  <input type="number" name="quantity" min="1" max="50" placeholder="" required autocomplete="off"/> </p>
			  <input type='submit' name='cart' value='Add to Cart'/>
			  
		<?php } ?>	  
			

		  
 </div>
 </div>
 
 

 			<div class="grid_9">
					<div class="box">
						  
          <h2>Category</h2> </p>
		  
		  <?php
					date_default_timezone_set(America/Chicago);
					include('db.php');
					$query1 = "select DISTINCT category FROM inventory";
					$result1 = mysql_query($query1);
					
					if($result1){ 
					
					while($row = mysql_fetch_array($result1)){
					
					echo "<div class='w3-show-inline-block'> ";
					$category = $row['category'];
					echo " <form action='' method='post' name='submit'>	";
					 echo "<div class='w3-bar'> ";
                    echo "<input type='submit' name='category' value='$category'/>";					
					//echo '<span class="a"><b>';
					//echo "".$row['category']."</b></span>";
					echo "&nbsp";
					echo "</div> ";
					echo " </form>";
					echo "</div> ";
					
					
					}
					 
					}
					
					?>

	  
 </div>
 </div>
 <?php
if (isset($_POST['category'])) {
$category = $_POST[category];

 			echo '<div class="grid_9">';
				echo '	<div class="box">';
				echo ' <h2>Products</h2> </p>';
						  
  date_default_timezone_set(America/Chicago);
					include('db.php');
					$query2 = "select product FROM inventory where category = '$category'";
					$result2 = mysql_query($query2);

					if($result2){ 
					
					while($row = mysql_fetch_array($result2)){
					
				echo "<div class='w3-show-inline-block'> ";
					$product = $row['product'];
					echo " <form action='' method='post' name='submit'>	";
					 echo "<div class='w3-bar'> ";
                    echo "<input type='submit' name='product' value='$product'/>";					
					//echo '<span class="a"><b>';
					//echo "".$row['category']."</b></span>";
					echo "&nbsp";
					echo "</div> ";
					echo " </form>";
					echo "</div> ";
		  



	}
	}
	echo " </div>";
echo " </div>";
	}
	
	
?>


<div class="grid_15">
					<div class="box">
						  
          <h2>CART</h2> </p>
		  
		  <?php
		  if (isset($_POST['cart'])) {
             $product = $_POST[product];
			 $amount =  $_POST[amount];
			 $quantity =  $_POST[quantity];
			 $total = $_POST[amount] * $_POST[quantity];
			  
			 
					date_default_timezone_set(America/Chicago);
					include('db.php');
			 $query = "INSERT into `cart` (product, amount, quantity, cart_no, total) VALUES ('$_POST[product]', '$_POST[amount]', '$_POST[quantity]', '100', '$total')";
			  $result = mysql_query($query);
			  
						if(!$result){
						die("ERROR: " . mysql_error() );
						}
			 	echo "<meta http-equiv=\"refresh\" content=\"0;\"/>";
					 
			} 				
					echo " <form action='' method='post' name='submit'>	";
					include('db.php');
echo "<table>";
     echo "<thead>";
      echo "<tr>";
          echo "<th>Product</th>";
          echo "<th>Amount</th>";
		  echo "<th>Quantity</th>";
		  echo "<th>Total</th>";
		  echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
       $result5 = mysql_query("select * from cart where cart_no='100'"); 
          while( $row = mysql_fetch_assoc( $result5 ) ){
              echo "<tr>";
             echo " <td>{$row['product']}</td>";
              echo "<td>{$row['amount']}</td>";
              echo "<td>{$row['quantity']}</td>";
			  echo "<td>{$row['total']}</td>";
			
	 echo "</tr>";
			  
                
            
          
     }
	 
	 
	 
echo "</tbody>";
    echo "</table>";
	$result6 = mysql_query("SELECT ROUND(SUM(total), 2) FROM `cart` WHERE `cart_no` = '100'");
					$row6 = mysql_fetch_array($result6);
					$total = $row6[0];
                     	$taxRate=9.6;
						$tax=$total*$taxRate/100;
						$final_total=round( ($total+$tax), 2);
						 					
					
		
		echo "<p> <b>Total Value of Goods = </b>"; echo "$"; echo $total	; echo "<b> + Sales Tax (9.60000%) = "; echo "$"; echo "$final_total </b></p>";
		echo "<p> <b>Discounts can be applied at check out!</b></p>";
                    echo "<input style='margin-left:30px;' type='submit' name='checkout' value='Check Out'/>";	
                    echo "<input style='margin-left:30px;'type='submit' name='clearcart' value='Clear Cart'/>";						
					echo " </form>";
					?>

					
	 <?php
		  if (isset($_POST['clearcart'])) {  
		  mysql_query( "DELETE FROM cart WHERE cart_no = 100" );
		  
			 	echo "<meta http-equiv=\"refresh\" content=\"0;\"/>";
		  
		  }
		  ?>

 </div>
 </div>
 

		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					<a href="#">Contact Me</a>
				</div>
			</div>
		</div>
	</body>
</html>