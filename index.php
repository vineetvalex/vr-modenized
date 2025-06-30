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

			<div align="center"><br />
			<h3>SECURE LOGIN</h3>
 
                        <div class="thumb-pad1">
                            <div class="thumbnail">
                           <h2 align="center">WELCOME to KCS</h2>

<form name="registration" action="" method="post">
  <div class="imgcontainer">
    <img src="image/KCS.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Login</b></label>
    <input type="text" name="userLogin" /><br />
	
	

    <label><b>Password</b></label>
    <input type="password" name="userPassword" />
     </br>
	 <input type="submit" name="login" value="LOGIN">
    </div>

</form>


<?php
// check to see if login form has been submitted
if(isset($_POST['login'])){
$user=$_POST['userLogin'];
$pass=$_POST['userPassword'];
	// run information through authenticator
	if($user == "admin" and $pass == "v6g6oupsKCsmokz")
	{
		session_start();
		$_SESSION['username'] = $user;
			echo $_SESSION['username'];
		header("Location: dashboard.php");
		//die();
	} elseif ($user == "manager" and $pass == "100KCSmokZ001")
	{
		session_start();
		$_SESSION['username'] = $user;
			echo $_SESSION['username'];
		header("Location: dashboard.php");
		//die();
	} 
	elseif ($user == "storemanager" and $pass == "100KCSmokZManager")
	{
		session_start();
		$_SESSION['username'] = $user;
			echo $_SESSION['username'];
		header("Location: dashboard.php");
		//die();
	} 	
	else {
		$error = 1;
	}
	
}
 
// output error to user
if(isset($error)) echo "Login failed: Incorrect user name, password, or rights<br /-->";

?>








							</div>
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