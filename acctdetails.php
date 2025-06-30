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
		
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
	<script src="js/sorttable.js"></script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>
	
<script>
																function target_popup(form) {
																		window.open('', 'formpopup', 'width=800,height=800,resizeable,scrollbars');
																		form.target = 'formpopup';
																	}
</script>
		<h1 id="head">KCS</h1>
		
	 
 <div id="content" class="container_16 clearfix">
 <?php
session_start();
				include('db.php');
	$year = $_POST[year];
	$account_name = $_POST[account_name];
echo "<h2>$account_name Summary</h2>";
		echo '<div class="grid_16">';
echo "<h3>Received Fund</h3>";

echo "<h3> </h3>";
echo "<table class='sortable'>";
     echo "<thead>";
      echo "<tr>";
        //echo "<th>Member</th>";
        echo "<th>DATE</th>";
         echo "<th>Method</th>";
          echo "<th>Account</th>";
		  echo "<th>Amount</th>";
		  echo "<th>Actual</th>";
		  echo "<th>Purpose</th>";
		  echo " <th>Description</th>";
        echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
       $result = mysql_query("select * from received where year='$year' and account='$account_name'"); 
          while( $row = mysql_fetch_assoc( $result ) ){
              echo "<tr>";
			  //$id=$row['id'];
			 // $nameresult= mysql_query("SELECT  `product` FROM  `inventory` WHERE  `id` =  '$id'");
			 // $namerow = mysql_fetch_array($nameresult);
			 // $name=$namerow[0];
            // echo " <td>$name</td>";
              echo "<td>{$row['date']}</td>";
              echo "<td>{$row['method']}</td>";
              echo "<td>{$row['account']}</td>";
              echo "<td>$"; echo"{$row['amount']}</td> ";
              echo "<td>{$row['bill']}</td>";
              echo "<td>{$row['received_for']}</td>";
              echo "<td>{$row['description']}</td> ";			  
            echo "</tr>";
          
     }
echo "</tbody>";
    echo "</table>";		


echo "<h3>Expense</h3>";
echo "<table class='sortable'>";
     echo "<thead>";
      echo "<tr>";
        echo "<th>DATE</th>";
         echo "<th>Method</th>";
          echo "<th>Account</th>";
		  echo "<th>Amount</th>";
		  echo "<th>Actual</th>";
		  echo "<th>Purpose</th>";
		  echo " <th>Description</th>";
        echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
       $result = mysql_query("select * from expense where year='$year' and account='$account_name'"); 
          while( $row = mysql_fetch_assoc( $result ) ){
              echo "<tr>";
              echo "<td>{$row['date']}</td>";
              echo "<td>{$row['method']}</td>";
              echo "<td>{$row['account']}</td>";
              echo "<td>$"; echo"{$row['amount']}</td> ";
              echo "<td>{$row['bill']}</td>";
              echo "<td>{$row['received_for']}</td>";
              echo "<td>{$row['description']}</td> ";			  
            echo "</tr>";
          
     }
echo "</tbody>";
    echo "</table>";			
					
?>

		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					<a href="#">Contact Me</a>
				</div>
			</div>
		</div>
	</body>
</html>