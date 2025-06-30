<?php
$connection = mysql_connect('localhost', 'vrgroupsofllc', 'v6g6oup$KC$mokz');
if (!$connection){
 die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('vracct');
if (!$select_db){
 die("Database Selection Failed" . mysql_error());
}
?>