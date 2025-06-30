<?php include("auth.php");?>

<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the  table
*/

 // connect to the database
 include('db.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM inventory WHERE id=$id")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: dashboard.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: dashboard.php");
 }
 
?>