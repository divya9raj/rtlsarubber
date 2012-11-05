<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTLSA_Rubbers</title>
</head>
<?php ob_start();?>
<?php include 'site_header.php';?>
<table width="1018" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td colspan="6" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="172" rowspan="5" bgcolor="#FFFFFF" class="content">&nbsp;</td>
    <td width="162" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_index.php">My Profile</a></div></td>
    <td width="165" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_passwordchange.php">Change Password</a></div></td>
    <td width="165" bgcolor="#E2E2E2" class="content"><div align="center"><a href="enquiry_page.php">Make Enquiry</a></div></td>
    <td width="165" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_enquiry.php">Enquiry &amp; Status</a></div></td>
    <td width="163" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_order.php">Order &amp; Status</a></div></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF" class="content"><?php
session_start();
include('/customer.class.php');
$login = new Customer();
if($login->isLoggedIn())
	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a><br>" ;	
else
	echo ("You must be logged in!");
?>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><span class="page_title">Change Password</span></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#F5F5F5"><span class="error-messages"><span class="content">
      <?php

$user = $_SESSION['username'];
if ($user)
{

if (@$_POST['submit'])
{

$oldpassword  = md5($_POST['oldpassword']);
$newpassword  = md5($_POST['newpassword']);
$repeatnewpassword  = md5($_POST['repeatnewpassword']);

// check password against database

// connect to database
$connect = mysql_connect ("localhost","root","test123") or die ("Couldn't connect to mysql");
mysql_select_db("rtlsa") or die ("Couldn't find database");

$queryget = mysql_query("SELECT password FROM customer WHERE username='$user'") or die ("Query didn't work");
$row = mysql_fetch_assoc($queryget);

$oldpassworddb = $row['password'];

// check passwords
if ($oldpassword==$oldpassworddb)
{
	// check two new passwords
	if ($newpassword==$repeatnewpassword)
	{
		echo "Success!";
		
		$querychange = mysql_query("
		UPDATE customer SET password='$newpassword' WHERE username='$user';");
		  
		session_destroy();
		die ("Your password has been changed successfully. <a href='customer_index.php'>Return</a> to member page.");
	}
	else
		die ("New passwords don't match!");
}
else 
	die ("Old password doesn't match!");
}
else 
{
echo"
<form action='customer_passwordchange.php' method='POST'>              
	<br>Old Password<br><input type='password' name='oldpassword' size='25' class='content'><br>
	<br>New Password<br> <input type='password' name='newpassword' size='25' class='content'><br>
	<br>Repeat New Password<br><input type='password' name='repeatnewpassword' size='25' class='content'><br><br>
						 <input type='submit' name='submit' value='Change Password' class='buttons'>
</form>
";
}
}
else 
	die ("You must be logged in to change your password!");

?>
      <br />
    </span></span></td>
  </tr>
  <tr>
    <td colspan="6" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
