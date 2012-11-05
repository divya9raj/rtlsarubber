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
  <td bgcolor="#FFFFFF" class="content"><?php
session_start();
include('/employee.class.php');

$login = new Employee();
if($login->isLoggedIn())
{
  	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a>&nbsp;&nbsp;|&nbsp;&nbsp;" ;
	$user = $_SESSION['username'];
    //if ($user == "admin")
//echo "<br><a href='employee_register.php'>Register Employees</a><br>";
}	
else
	echo ("You must be logged in!");
?>
<?php
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
  <td bgcolor="#FFFFFF" class="content"><span class="page_title">List Of Enquiries</span></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
</tr>
<tr>
  <td bgcolor="#F0F0F0" class="content"><table width="836" border="0" align="left" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="content">
    
    <tr>
      <td width="209" bgcolor="#E6E6E6"><div align="center" class="content"><span style="font-weight: bold">Enquiry ID</span><br />
        <span class="textbox">(Click ID to view)</span></div></td>
      <td width="209" bgcolor="#E6E6E6"><div align="center"><span style="font-weight: bold">Enquiry Status</span><br />
        <br />
        </div></td>
      <th width="209" bgcolor="#E6E6E6"><div align="center">Enquiry Type<br />
        <br />
        </div></th>
      <td width="209" bgcolor="#E6E6E6"><div align="center">
        <p><strong>Date Enquired</strong><br />
          <br />
          </p>
        </div></td>
      </tr>
    <tr>
      <td bgcolor="#F0F0F0">
        <div align="center">
          
          <?php
$user = $_SESSION['username'];

$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
//if (! $result){
  //echo 'Database error: ' . mysql_error();
//}
$staff_type = $result['staffType'];
if ($staff_type == "CommercialManager")
{
$sql       = mysql_query("SELECT * from enquiry WHERE status = 'Open' or status = 'NotAvailable' or status = 'Available' or status = 'Rejected' or status = 'Approved' or status = 'Disapproved' ORDER BY datetime asc");
$countsql  = mysql_query("SELECT count(enquiryID) from enquiry WHERE status = 'Open' or status = 'NotAvailable' or status = 'Available' or status = 'Rejected' or status = 'Approved' or status = 'Disapproved'");
}
elseif ($staff_type  == "InvestigatingEngineer")
{
$sql       = mysql_query("SELECT * from enquiry WHERE status = 'Assigned' ORDER BY datetime asc");
$countsql  = mysql_query("SELECT count(enquiryID) from enquiry WHERE status = 'Assigned'");
}
if (!($user=="admin"))
{
$count_row = mysql_fetch_array($countsql);
$limit     = $count_row['count(enquiryID)'];
echo "Total Enquiries:&nbsp".$limit."\n";

$limit = 1;
$count = 0;

echo "<table border='0' class='content'>";

while ($row = mysql_fetch_array($sql))
{
	$enqid = $row['enquiryID'];
     	
	if ($count < $limit)
	{	
		if ($limit == 0)
		{
		echo "<tr>";
		}		
		echo "<td><a href='enquiry_details.php?enqid=$enqid&ust=staff'>$enqid</a><br></td>"; 
		}
		else
		{	
		$count = 0;
		echo "<tr>";
		echo "<td><a href='enquiry_details.php?enqid=$enqid&ust=staff'>$enqid</a><br></td>"; 
		}
		$count++;
		}
		echo "</tr></table>";			
}
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
$sql = mysql_query("SELECT * from enquiry WHERE status = 'Open' or status = 'NotAvailable' or status = 'Available' or status = 'Rejected' or status = 'Approved' or status = 'Disapproved' ORDER BY datetime asc");
else
$sql = mysql_query("SELECT * from enquiry WHERE status = 'Assigned' ORDER BY datetime asc");

$limit = 1;
$count = 0;

echo "<table border='0' class='content'>";

while ($row = mysql_fetch_array($sql))
{
	$enqstatus = $row['status'];
	if ($count < $limit)
	{	
		if ($count == 0)
		{
		echo "<tr>";
		}		
		echo "<td>$enqstatus</td>";
		}
		else
		{	
		$count = 0;
		echo "</tr><tr><td>$enqstatus</td>";
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
$sql = mysql_query("SELECT * from enquiry WHERE status = 'Open' or status = 'NotAvailable' or status = 'Available' or status = 'Rejected' or status = 'Approved' or status = 'Disapproved' ORDER BY datetime asc");
else
$sql = mysql_query("SELECT * from enquiry WHERE status = 'Assigned' ORDER BY datetime asc");

$limit = 1;
$count = 0;

echo "<table border='0' class='content'>";

while ($row = mysql_fetch_array($sql))
{
	$enqtype = $row['enquiryType'];
	if ($count < $limit)
	{	
		if ($count == 0)
		{
		echo "<tr>";
		}		
		echo "<td>$enqtype</td>";
		}
		else
		{	
		$count = 0;
		echo "</tr><tr><td>$enqtype</td>";
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
$sql = mysql_query("SELECT * from enquiry WHERE status = 'Open' or status = 'NotAvailable' or status = 'Available' or status = 'Rejected' or status = 'Approved' or status = 'Disapproved' ORDER BY datetime asc");
else
$sql = mysql_query("SELECT * from enquiry WHERE status = 'Assigned' ORDER BY datetime asc");

$limit = 1;
$count = 0;

echo "<table border='0' class='content'>";

while ($row = mysql_fetch_array($sql))
{
	$enqdatetime = $row['datetime'];
	if ($count < $limit)
	{	
		if ($count == 0)
		{
		echo "<tr>";
		}		
		echo "<td>$enqdatetime</td>";
		}
		else
		{	
		$count = 0;
		echo "</tr><tr><td>$enqdatetime</td>";
		}
		$count++;
		}
		echo "</tr></table>";
?>
        </div></td>
      </tr>
    <tr>
      <td colspan="4" bgcolor="#F0F0F0">&nbsp;</td>
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