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
    <td colspan="6" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="172" rowspan="11" class="content"><p align="left">&nbsp;</p>
        <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p></td>
    <td width="162" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_index.php">My Profile</a></div></td>
    <td width="165" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_passwordchange.php">Change Password</a></div></td>
    <td width="165" bgcolor="#E2E2E2" class="content"><div align="center"><a href="enquiry_page.php">Make Enquiry</a></div></td>
    <td width="165" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_enquiry.php">Enquiry &amp; Status</a></div></td>
    <td width="163" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_order.php">Order &amp; Status</a></div></td>
  </tr>
  <tr>
    <td colspan="5" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="content"><?php
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
    <td colspan="5" class="content"><span class="page_title">Order History and Status</span></td>
  </tr>
  <tr>
    <td colspan="5" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="content">Your order history and status are as below. </td>
  </tr>
  <tr>
    <td colspan="5" class="content"><table width="836" height="122" border="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="content">
      <tr>
        <th width="278" bgcolor="#E6E6E6">Order ID</th>
        <th width="278" bgcolor="#E6E6E6"><div align="center">Enquiry ID</div></th>
        <td width="278" bgcolor="#E6E6E6"><div align="center"> <span style="font-weight: bold">Order Status</span></div></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0"><div align="center">
          <?php
$username = $_SESSION['username'];
// select details from database for the current user
$sql=("SELECT orderid FROM orders WHERE username = '$username' && status = 'OrderPlaced'");
$result = mysql_query($sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
while($value = mysql_fetch_assoc($result))
{
$orderid  = $value['orderid'];

echo "<a href='order_details.php?orderid=$orderid&ust=cust'>$orderid</a><br>"; 
}
?>
        </div></td>
        <td bgcolor="#F0F0F0"><div align="center">
          <?php
		  $username = $_SESSION['username'];

$sql =("SELECT enquiryID from orders WHERE username = '$username'  && status = 'OrderPlaced'");
$result = mysql_query($sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
while ($value = mysql_fetch_assoc($result))
{
$enqid 	= $value['enquiryID'];
	
echo $enqid."<br>";
}
?>
        </div></td>
        <td bgcolor="#F0F0F0"><div align="center">
          <?php
$username = $_SESSION['username'];
// select details from database for the current user
$sql=("SELECT status FROM orders WHERE username = '$username' && status = 'OrderPlaced'");
$result = mysql_query($sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
while ($value = mysql_fetch_assoc($result))
{
$orderstatus  = $value['status'];

echo $orderstatus."<br>";
}
?>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="5" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="content"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF" class="content">&nbsp;</td>
</tr>
  <tr>
    <td colspan="6" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
