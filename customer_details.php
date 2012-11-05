<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTLSA_Rubbers</title>
</head>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php ob_start();?>
<?php include 'site_header.php';?>
<table width="1018" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
<tr>
    <td bgcolor="#FFFFFF" class="content">  
  <tr>
    <td width="172" rowspan="6" class="content">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>

    <td width="836" bgcolor="#FFFFFF" class="content"><FORM><INPUT TYPE="button" VALUE="Back" class="buttons" onClick="history.go(-1);return true;"></FORM><?php
session_start();
include('/employee.class.php');

$login = new Employee();
if($login->isLoggedIn())
{
  	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a><br>" ;
}	
else
	echo ("You must be logged in!");
?></td>
</tr>
<tr>
  <td width="836" bgcolor="#FFFFFF" class="content"><span class="page_title">Customer Details</span></td>
</tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content"><table width="835" border="0">
      <tr>
        <th width="300" bgcolor="#E6E6E6" class="content" scope="col"><div align="center" style="font-weight: bold">
          <div align="left">Salutation</div>
          </div></th>
        <td width="525" bgcolor="#E6E6E6" scope="col"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$custid=$_GET['custid'];

$cust_sql = mysql_query("SELECT * from customer WHERE username = '$custid'");
$cust_result= mysql_fetch_array($cust_sql);
$salutation 		= $cust_result['salutation'];

echo $salutation;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="center" style="font-weight: bold">
          <div align="left">First Name</div>
          </div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$custid=$_GET['custid'];

$cust_sql = mysql_query("SELECT * from customer WHERE username = '$custid'");
$cust_result= mysql_fetch_array($cust_sql);
$firstname 		= $cust_result['firstname'];

echo $firstname;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Last Name</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$custid=$_GET['custid'];

$cust_sql = mysql_query("SELECT * from customer WHERE username = '$custid'");
$cust_result= mysql_fetch_array($cust_sql);
$lastname 		= $cust_result['lastname'];

echo $lastname;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Company Name</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$custid=$_GET['custid'];

$cust_sql = mysql_query("SELECT * from customer WHERE username = '$custid'");
$cust_result= mysql_fetch_array($cust_sql);
$companyname 		= $cust_result['firstname'];

echo $companyname;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Position</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$custid=$_GET['custid'];

$cust_sql = mysql_query("SELECT * from customer WHERE username = '$custid'");
$cust_result= mysql_fetch_array($cust_sql);
$position 		= $cust_result['position'];

echo $position;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Address</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$custid=$_GET['custid'];

$cust_sql = mysql_query("SELECT * from customer WHERE username = '$custid'");
$cust_result= mysql_fetch_array($cust_sql);
$address 		= $cust_result['address'];

echo $address;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Country</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$custid=$_GET['custid'];

$cust_sql = mysql_query("SELECT * from customer WHERE username = '$custid'");
$cust_result= mysql_fetch_array($cust_sql);
$country 		= $cust_result['country'];

echo $country;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Contact No</span>.</div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$custid=$_GET['custid'];

$cust_sql = mysql_query("SELECT * from customer WHERE username = '$custid'");
$cust_result= mysql_fetch_array($cust_sql);
$contactno 		= $cust_result['contactno'];

echo $contactno;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Email ID</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$custid=$_GET['custid'];

$cust_sql = mysql_query("SELECT * from customer WHERE username = '$custid'");
$cust_result= mysql_fetch_array($cust_sql);
$email 		= $cust_result['email'];

echo $email;

?>
          </div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
    <td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
  </tr>
<tr>
  <td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
  
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
    
      </tr>
</table>