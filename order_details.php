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
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="172" rowspan="6" class="content">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content"><FORM><INPUT TYPE="button" VALUE="Back" class="buttons" onClick="history.go(-1);return true;"></FORM><?php
session_start();
include('/employee.class.php');

$login = new Employee();
$user = $_SESSION['username'];
echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a><br>" ;
?>	</td>
  </tr>
  <tr>
    <td width="836" bgcolor="#FFFFFF" class="content"><span class="page_title">Order Details</span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content">Your selected order details</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content"><table width="836" border="0">
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="center" style="font-weight: bold">
          <div align="left">Enquiry ID</div>
        </div></td>
        <td bgcolor="#F0F0F0" class="content"><?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$orderid=$_GET['orderid'];

$enq_sql = mysql_query("SELECT * from orders WHERE orderid = '$orderid'");
$enq_result= mysql_fetch_array($enq_sql);
$enqid 	= $enq_result['enquiryID'];
	
echo "<a href='enquiry_details.php?enqid=$enqid&ust=cust'>$enqid</a>";

?></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><strong>Quantity Required</strong></td>
        <td bgcolor="#F0F0F0" class="content"><?php
// select details from database for the current user
$sql=("SELECT quantity FROM orders WHERE orderid = '$orderid'");
$result = mysql_query($sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
while ($value = mysql_fetch_assoc($result))
{
$quantity = $value['quantity'];

echo $quantity."<br>";
}
?></td>
      </tr>
      <tr>
        <td width="248" bgcolor="#F0F0F0" class="content"><strong>Date-Time Ordered</strong></td>
        <td width="578" bgcolor="#F0F0F0" class="content"><?php
// select details from database for the current user
$sql=("SELECT datetime FROM orders WHERE orderid = '$orderid'");
$result = mysql_query($sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
while ($value = mysql_fetch_assoc($result))
{
$orderdatetime = $value['datetime'];

echo $orderdatetime."<br>";
}

$ust = $_GET['ust'];
if ($ust=='cust')
{

echo"</div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
    <td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
    <td bgcolor='#FFFFFF' class='content'><a href='cancel_order.php?orderid=$orderid'>Click Here</a> to Cancel This Order</td>
  </tr><td colspan='2' bgcolor='#CCCCCC' class='content'><p><div align='center'><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div>
</table>";
}
?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
    <td bgcolor='#FFFFFF' class='content'></td>
</tr>
</table>