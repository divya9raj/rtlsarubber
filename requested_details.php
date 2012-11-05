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
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="172" rowspan="6" class="content">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content"><FORM><INPUT TYPE="button" VALUE="Back" class="buttons" onClick="history.go(-1);return true;"></FORM>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content"><?php
session_start();
include('/customer.class.php');
$login = new Customer();
if($login->isLoggedIn())
	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a><br>" ;	
else
	echo ("You must be logged in!");
?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content"><span class="page_title">Notification Details</span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0" class="content"><span class="customer_menu">
      <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$enqid 	= $enq_result['enquiryID'];
$priceperquantity 	= $enq_result['priceperquantity'];
$sample 	= $enq_result['sample'];
$deliverytime 	= $enq_result['deliverytime'];
$status     = $enq_result['status'];
if($status == 'Rejected')

 echo "Sorry your enquiry has been rejected!<br>";
 
else if($status == 'Approved')
 {
echo "Your enquiry has been approved!<p>";
echo "Enquiry ID:&nbsp;".$enqid."<br>";
echo "Price Per Quantity:&nbsp;"."$$priceperquantity.00<br>";
echo "Sample Availability:&nbsp;".$sample."<br>";
echo "Delivery Time for the Enquiry:&nbsp;".$deliverytime."<p>";

echo "You can proceed with placing order or ending the task later by viewing this enquiry in the enquiry & status page"; 

 }
else if($status == 'Disapproved')
{
echo "Sorry, you enquiry has been disapproved!<br>";
}
?>
    </span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
