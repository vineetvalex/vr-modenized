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
			<li><a href="accounts.php">Accounts</a></li>							
			<li><a class="active" href="budget.php">Budget</a></li>
			<li><a href="report.php">Reporting</a></li>
			<li><a href="emp.php">Employee</a></li>
			<li><a href="#">Access Links</a></li>
		</ul>
		
 
 <div id="content" class="container_16 clearfix">
<h2>Accounts Summary</h2>
   
															
                    
               
				
                            <h4>Update Budget Details for <?php echo date("Y",strtotime("-1 year")); ?></h4>
											
				 
				 <?php
				 require('db.php');
				 $year=date("Y",strtotime("-1 year"));
				$result1 = mysql_query("select * from accounts");	
		while ($row = mysql_fetch_assoc($result1)) {
					//echo "<p><label> $row[account_name] </label>";
					$account_name=$row['account_name'];
					$result2 = mysql_query("select * from budget where account='$account_name' and year='$year'");
					while ($row1 = mysql_fetch_assoc($result2)) {
					?>
					<form action="" method="post" name="submit">
					<label> <?php echo $row['account_name'] ?> </label>
<input type="hidden" name="account_name" required value= "<?php echo $row['account_name'] ?>" />
EXPENSE: <input type="text" name="expense" required value= "<?php echo $row1['expense'] ?>" />
INCOME:	<input type="text" name="income" required value= "<?php echo $row1['income'] ?> " />
					<input  type="submit" name="submit" value="submit" > 
					</form>						
					<?php					
					}
					echo '</p>';
					}
					?>
					
 					
<?php
			 
			 if (isset($_POST['submit'])){
			 require('db.php');
			 $year=date("Y",strtotime("-1 year"));
			 $account=$_POST[account_name];
			 $expense=$_POST[expense];
			 $income=$_POST[income];
			 //$query = "INSERT into `budget` (year, account, expense, income) VALUES ('$year', '$account', '$expense', '$income')";
			mysql_query("UPDATE budget SET  expense='$expense', income='$income' WHERE account='$account' AND year='$year'")or die();
		   // $result = mysql_query($query);			  
				//		if(!$result){
				//		die("ERROR: " . mysql_error() );
				//		}
			  echo "<script type='text/javascript'>alert('updated')</script>";			 
							echo "<meta http-equiv=\"refresh\" content=\"0;\"/>";
					} 
			?>  


<h3> Add a new Account </h3>

<form action="" method="post" name="submit1">
Account Name: <input type="text" name="account" required value=" "  />
<input type="hidden" name="kc_acct" value="kc_acct">
Income: <input type="text" name="income" required value=""  />
Expense: <input type="text" name="expense" required value=""  />
<input  type="submit" name="submit1" value="submit" > 
</form>

<?php
			 
			 if (isset($_POST['submit1'])){
			 require('db.php');
			 $year=date("Y",strtotime("-1 year"));
			 $account=mysql_real_escape_string($_POST['account']);
			 $fund=mysql_real_escape_string($_POST['fund']);
			 $income=mysql_real_escape_string($_POST['income']);
			 $expense=mysql_real_escape_string($_POST['expense']);
			 mysql_query("INSERT into `accounts` (account_name, kc_acct) VALUES ('$account', '$account')") or die("ERROR: " . mysql_error());
			 mysql_query("INSERT into `budget` (year, account, income, expense) VALUES ('$year', '$account', '$income', '$expense')") or die("ERROR: " . mysql_error());
	
			  echo "<script type='text/javascript'>alert('updated')</script>";			 
							echo "<meta http-equiv=\"refresh\" content=\"0;\"/>";
					} 
			?> 
			
			<div>
			</p></p></p></p>
			<h2 > </h2>
			
			</div>
			
			<div> 
			
			<h2 > <b> Opening Balance of the Banks </h2>
			
			 <?php
				 require('db.php');
				 $year=date("Y",strtotime("-1 year"));
				$openu = mysql_query("SELECT SUM(usbank) FROM `budget` WHERE `year` = '$year'");
				$rowu = mysql_fetch_array($openu);
				$openusbank = $rowu[0];
					?>

<form action="" method="post" name="submit2">
US BANK Opening Balance: <input type="text" name="usbank" required value="<?php echo $openusbank ?>"   />
<input  type="submit" name="submit2" value="submit" > 
</form>

<?php
			 
			 if (isset($_POST['submit2'])){
			 require('db.php');
			 $year=date("Y",strtotime("-1 year"));
			 $usbank=$_POST[usbank];
			//$query = "INSERT into `budget` (year, account, expense, income) VALUES ('$year', '$account', '$expense', '$income')";
			
			mysql_query("UPDATE budget SET  usbank='$usbank' WHERE year='$year' and account=' ' ")or die();
		   // $result = mysql_query($query);			  
				//		if(!$result){
				//		die("ERROR: " . mysql_error() );
				//		}
			  echo "<script type='text/javascript'>alert('updated')</script>";			 
							echo "<meta http-equiv=\"refresh\" content=\"0;\"/>";
					} 
			?>  
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