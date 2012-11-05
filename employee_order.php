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
  <td width="173" rowspan="5" class="content">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" class="content"><?php
session_start();
include('/employee.class.php');

$login = new Employee();
if($login->isLoggedIn())
{
  	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a>&nbsp;&nbsp;|&nbsp;&nbsp;" ;
	$user = $_SESSION['username'];
}	
else
	echo ("You must be logged in!");
?><?php
$user = $_SESSION['username'];

$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
//if (! $result){
  //echo 'Database error: ' . mysql_error();
//}
$staff_type = $result['staffType'];
if ($staff_type == "CommercialManager")
{
echo "<a href='employee_enquiry.php'>Manage Enquiries</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='employee_order.php'>View Orders</a><br>";  
}
elseif ($staff_type  == "InvestigatingEngineer")
{
echo "<a href='employee_enquiry.php'>View Enquiries & Search Recipe</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='create_recipe.php'>Create Recipe</a><br>";
}		
?></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" class="content"><span class="page_title">List Of Orders</span></td>
</tr>
<tr>
<td bgcolor="#FFFFFF" class="content">&nbsp;</td>
</tr>
<tr>
<td width="835" bgcolor="#F0F0F0" class="content"><br />
  <table width="835" border="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="content">
    
  <tr>
    <td width="275" bgcolor="#F0F0F0"><div align="center" class="content"><span style="font-weight: bold">Order ID</span><br />
      <span class="table-titles">(Click ID to view)</span></div></td>
    <td width="275" bgcolor="#F0F0F0"><div align="center"><span style="font-weight: bold">Order Status</span><br />
      <br />
      </div></td>
    <td width="275" bgcolor="#F0F0F0"><div align="center"><span style="font-weight: bold">Date-Time Ordered</span><br />
      <br />
      </div></td>
    </tr>
  <tr>
  <td bgcolor="#F0F0F0">
  <div align="center">
    
  <?php
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
//if (! $result){
  //echo 'Database error: ' . mysql_error();
//}
$staff_type = $result['staffType'];
if ($staff_type == "CommercialManager")
{
$sql       = mysql_query("SELECT * from orders WHERE status = 'OrderPlaced' or status = 'OrderCancelled'");
$countsql  = mysql_query("SELECT count(orderid) from orders WHERE status = 'OrderPlaced' or status = 'OrderCancelled'");
}
else
{

}
$count_row = mysql_fetch_array($countsql);
$limit     = $count_row['count(orderid)'];
echo "Total Orders:&nbsp".$limit."\n";

$limit = 1;
$count = 0;
echo "<table border='0' class='content'>";

while ($row = mysql_fetch_array($sql))
{
	$orderid = $row['orderid'];
     	
	if ($count < $limit)
	{	
		if ($limit == 0)
		{
		echo "<tr>";
		}		
		echo "<td><a href='order_details.php?orderid=$orderid&ust=staff'>$orderid</a><br></td>"; 
		}
		else
		{	
		$count = 0;
		echo "<tr>";
		echo "<td><a href='order_details.php?orderid=$orderid&ust=staff'>$orderid</a><br></td>"; 
		}
		$count++;
		}
		echo "</tr></table>";			
?>
  </div></td>
  <td bgcolor="#F0F0F0"><div align="center"><br />
    <?php
//mysql_connect("localhost","root","test123") or die(mysql_error());
//mysql_select_db("rtlsa") or die (mysql_error());

$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
//if (! $result){
  //echo 'Database error: ' . mysql_error();
//}
$staff_type = $result['staffType'];
if ($staff_type == "CommercialManager")
$sql = mysql_query("SELECT * from orders WHERE status = 'OrderPlaced' or status = 'OrderCancelled'");
else

$limit = 1;
$count = 0;

echo "<table border='0' class='content'>";

while ($row = mysql_fetch_array($sql))
{
	$orderstatus	 = $row['status'];
	
	if ($count < $limit)
	{	
		if ($count == 0)
		{
		echo "<tr>";
		}		
		echo "<td>$orderstatus</td>";
		}
		else
		{	
		$count = 0;
		echo "</tr><tr><td>$orderstatus</td>";
		}
		$count++;
		}
		echo "</tr></table>";
				
?>
  </div></td>
  <td bgcolor="#F0F0F0"><div align="center">
    <br />
    <?php
//mysql_connect("localhost","root","test123") or die(mysql_error());
//mysql_select_db("rtlsa") or die (mysql_error());

$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
//if (! $result){
  //echo 'Database error: ' . mysql_error();
//}
$staff_type = $result['staffType'];
if ($staff_type == "CommercialManager")
$sql = mysql_query("SELECT * from orders WHERE status = 'OrderPlaced' or status = 'OrderCancelled'");
else


$limit = 1;
$count = 0;

echo "<table border='0' class='content'>";

while ($row = mysql_fetch_array($sql))
{
	$orderdatetime = $row['datetime'];
	if ($count < $limit)
	{	
		if ($count == 0)
		{
		echo "<tr>";
		}		
		echo "<td>$orderdatetime</td>";
		}
		else
		{	
		$count = 0;
		echo "</tr><tr><td>$orderdatetime</td>";
		}
		$count++;
		}
		echo "</tr></table>";
				
?>
  </div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#F0F0F0">&nbsp;</td>
    </tr>
</table></td>
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

<?php ob_flush();?>