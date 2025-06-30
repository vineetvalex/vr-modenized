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
		<li><a class="active" href="submit.php">Submit Expense/Income</a></li>
		<li><a href="deposit.php">Submit Bank Deposit</a></li>
		<li><a href="withdraw.php">Submit Bank Withdrawal</a></li>
		<li><a href="detailed.php">Detailed View</a></li>
		</ul>

			<div id="content" class="container_16 clearfix">
				<div class="grid_7">
					<div class="box">
						  
          <h2>SUBMIT EXPENSE </h2> </p>    
          <form action="" method="post" name="submit">          
          <div ></p>
			
			<label>Which Year's expense are you entering? </label> <strong>Be Carefull with the year</strong>
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
					  </select></p>
					
			   

			<label>Account to be in<span class="req">*</span></label>
			<?php
					date_default_timezone_set(America/Chicago);
					include('db.php');
					$query33 = "select account_name FROM accounts where account_name != ''";
					$result33 = mysql_query($query33);
					echo "<select name='account'>";
					if($result33){ 
					echo '<option></option>';
					while($row = mysql_fetch_array($result33)){
					//echo '<option value="'.$row['account_name'].">".$row['account_name'].'</option>';												
					echo "<option value=\"{$row['account_name']}\">".$row['account_name']."</option>";
					}
					echo '</select>'; 
					}
					
					?>
            
			<label>Amount<span class="req">*</span></label>
              <input type="text" name="amount" placeholder="" required autocomplete="off" />
			<label>Method Of Pay<span class="req">*</span> </label>
             <!-- <input type="text" name="method" placeholder="" required autocomplete="off" /> -->
			 <select name='method'>
			 <option value=""></option>	
			<option value="cash">CASH</option>		
			<option value="credit">CREDIT</option>	
			<option value="debit">DEBIT</option>	
			<option value="check">CHECK</option>	
			<option value="autopay">AUTO PAY</option>		
			</select>				
  			<label>Bill/Receipt No:<span class="req">*</span> </label>
              <input type="text" name="bill" placeholder="" required autocomplete="off" />            
			<label>Paid Against<span class="req">*</span> </label>
              <input type="text" name="payed_against" placeholder="" required autocomplete="off" />
            <label>Date of Expense<span class="req">*</span> </label> 
              <input type="text" name="date" id="datepicker" />
            <label>Description<span name="description" class="req">*</span> </label>
			 <textarea name="description" rows="7" cols="30"></textarea><br>      
           <input  type="submit" name="submit" value="submit"> 
          </form>
        </div>
      </div><!-- tab-content -->
    </div>

	  <?php
			session_start ();
			 require('db.php');
			 if (isset($_POST['submit'])){
			 $product = $_POST[product];
			 $queryget = "SELECT id FROM inventory WHERE product='$product'";
			 $getresult = mysql_query($queryget);
			$row = mysql_fetch_array($getresult);
			$id = $row ['id'];
			$query = "INSERT into `expense` (id, account, method, bill, amount, payed_against, year, date, description) VALUES ('$id', '$_POST[account]', '$_POST[method]', '$_POST[bill]', '$_POST[amount]', '$_POST[payed_against]', '$_POST[year]', '$_POST[date]', '$_POST[description]')";
			  $result = mysql_query($query);
			  
						if(!$result){
						die("ERROR: " . mysql_error() );
						}
			  echo "<script type='text/javascript'>alert('Expense Submitted Succesfully')</script>";			 
							echo "<meta http-equiv=\"refresh\" content=\"0;\"/>";
					} 
			?> 
				<div class="grid_7">
				<div class="box">						  
          <h2>SUBMIT INCOME </h2>         
          <form action="" method="post" name="submit1">          
          <div ></p></p>
					<!--<label>Income received from<span class="req">*</span></label>-->
		<?php
			//		date_default_timezone_set(America/Chicago);
			//		include('db.php');
			//		$query = mysql_query("select * from inventory"); // Run your query	
			//		echo '<select name="product">'; // Open your drop down box Loop through the query results, outputing the options one by one
			//		echo '<option></option>';
			//			while ($row = mysql_fetch_array($query)) {
			//		   echo '<option value="'.$row['product'].'">'.$row['product'].'</option>';
			///		}
			//		echo '</select>'; ?>
			
			<label>Which Year's income are you entering? </label> <strong>Be Carefull with the year</strong>
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
					  </select> </p>
			<label>Account to be in<span class="req">*</span></label>
			<?php
					date_default_timezone_set(America/Chicago);
					include('db.php');
					$query33 = "select account_name FROM accounts where account_name != ''";
					$result33 = mysql_query($query33);
					echo "<select name='account'>";
					if($result33){ 
					echo '<option></option>';
					while($row = mysql_fetch_array($result33)){
					//echo '<option value="'.$row['Field'].">".$row['Field'].'</option>';												
					echo "<option value=\"{$row['account_name']}\">".$row['account_name']."</option>";
					}
					echo '</select>'; 
					}
					
					?>
            
			<label>Amount<span class="req">*</span></label>
              <input type="text" name="amount" placeholder="" required autocomplete="off" />
			<label>Method Of Pay<span class="req">*</span> </label>
              <select name='method'>
			   <option value=""></option>	
			<option value="cash">CASH</option>		
			<option value="credit">CREDIT</option>	
			<option value="debit">DEBIT</option>	
			<option value="check">CHECK</option>	
			<option value="autopay">AUTO PAY</option>	
			</select>	
			<label>Actual Received<span class="req">*</span> </label>
              <input type="text" name="bill" placeholder="" required autocomplete="off" />
  			<label>Received For<span class="req">*</span> </label>
              <input type="text" name="received_for" placeholder="" required autocomplete="off" />
            <label>Date of Receiving<span class="req">*</span> </label> 
               <input type="text" name="date" id="datepicker1" />
            <label>Description<span name="description" class="req">*</span> </label>
			 <textarea name="description" rows="7" cols="30"></textarea><br>       
           <input  type="submit" name="submit1" value="submit" > 
          </form>
		  </div>
</div>

 <?php
			session_start ();
			 require('db.php');
			 if (isset($_POST['submit1'])){
			// $product = $_POST[product];
			// $queryget = "SELECT id FROM inventory WHERE product='$product'";
			// $getresult = mysql_query($queryget);
			//$row = mysql_fetch_array($getresult);
			//$id = $row ['id'];
			$query = "INSERT into `received` (id, account, method, bill, amount, received_for, year, date, description) VALUES ('0', '$_POST[account]', '$_POST[method]', '$_POST[bill]', '$_POST[amount]', '$_POST[received_for]', '$_POST[year]', '$_POST[date]', '$_POST[description]')";
			  $result = mysql_query($query);
			  
						if(!$result){
						die("ERROR: " . mysql_error() );
						}
			  echo "<script type='text/javascript'>alert('Income Entered Succesfully')</script>";			 
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