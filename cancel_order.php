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
<td bgcolor="#FFFFFF" class="content">

<?php
session_start();
include('/customer.class.php');
$login = new Customer();
if($login->isLoggedIn())
	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a><br>" ;	
else
	echo ("You must be logged in!");
?>

</td>
</tr>
<tr>
<td width="836" bgcolor="#FFFFFF" class="content"><span class="page_title">Cancel Order </span></td>
</tr>
<tr>
<td bgcolor="#FFFFFF" class="messages">&nbsp;</td>
</tr>
<tr>
<td bgcolor="#F5F5F5" class="messages">

<?php
if(isset($_POST['cancelorder']))
{
    include_once('/order.class.php');
    $cancelorder = new Order();

    if($cancelorder->cancel_order())
     echo "Order has been Cancelled Successfully!&nbsp;<a href='customer_index.php'>Return to Customer Page</a><br>";
    else
    $cancelorder->show_errors();
}
?>
    
<br /></td>
</tr>
<tr>
<td bgcolor="#F5F5F5" class="content"><form name="form1" method="post" action="">
<p>Confirm to cancel this order?  </p>
<p>
<input name="cancelorder" type="submit" class="buttons" id="cancelorder" value="Cancel Order" />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</p>
</form></td>
</tr>
<tr>
<td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
</tr>
<tr>
<td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
</tr>
<tr>
<td colspan="2" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2012 Divya - RTLSA_Rubbers </small></div></td>
</tr>
</table>