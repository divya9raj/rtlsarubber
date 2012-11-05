<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTLSA_Rubbers</title>
</head>
<?php ob_start();?>
<?php include 'site_header.php';?>
<tr>
  <td colspan="2" bgcolor="#FFFFFF" class="error-messages"><table width="1018" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <tr>
        <td colspan="2" bgcolor="#FFFFFF" class="error-messages">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#FFFFFF"><div align="right"></div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="172" bgcolor="#FFFFFF">&nbsp;</td>
        <td width="836"><span class="content">
          <?php
session_start();
include('/employee.class.php');

$login = new Employee();
if($login->isLoggedIn())
{
  	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a><br>" ;
}	
else
	echo ("You must be logged in!");
?>
        </span></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td><div align="left"><span class="customer_menu">
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
echo "<span class='page_title'>Commercial Manager View<p>";
echo "<span class='content'><a href='employee_enquiry.php'>Manage Enquiries</a><br><br><a href='employee_order.php'>View Orders</a><br>";   
}
elseif ($staff_type  == "InvestigatingEngineer")
{
echo "<span class='page_title'>Investigating Engineer View<p>";
echo "<span class='content'><a href='employee_enquiry.php'>Manage Enquiries and Search Recipe</a><br><br><a href='create_recipe.php'>Create Recipe</a><br>";
}		
?>
        </span></div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td class="content">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td class="content">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td class="content">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td class="content">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td class="content">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td class="content">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td class="content">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td class="content">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
      </tr>
    </table></td>
</tr>
  
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
<td bgcolor="#F0F0F0" class="error-messages">