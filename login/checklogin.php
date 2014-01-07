<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="widget"; // Mysql password 
$db_name="rdn"; // Database name 
$tbl_name="registro"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['user']; 
$mypassword=$_POST['pass']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($user);
$mypassword = stripslashes($pass);
$myusername = mysql_real_escape_string($user);
$mypassword = mysql_real_escape_string($pass);
$sql="SELECT * FROM $tbl_name WHERE username='$user' and password='$pass'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("user");
session_register("pass"); 
header("location:main.php");
}
else {
echo "Wrong Username or Password";
}
?>