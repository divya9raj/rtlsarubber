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
    <td colspan="6" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="172" rowspan="6" class="content">&nbsp;</td>
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
{
	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a><br>" ;	
	$username = $_SESSION['username'];
	
// select details from database for the current user
$sql=("SELECT * FROM customer WHERE username = '$username'");
$result = mysql_query($sql);

$value = mysql_fetch_assoc($result);
$notification = $value['notify'];
if ($notification == 0)
{
echo "Dear ".$_SESSION['username'].", You have no notifications.<br>";	
}
else if ($notification == 1)
{
echo "Dear ".$_SESSION['username'].", You have <a href='notifications.php'>".$notification." </a> notification. <br>";	
}
else if ($notification > 1)
{
echo "Dear ".$_SESSION['username'].", You have <a href='notifications.php'>".$notification." </a> notifications. <br>";	
}
}
else
	echo ("You must be logged in!");
?></td>
  </tr>
  <tr>
    <td colspan="5" class="content"><span class="page_title">My Profile</span></td>
  </tr>
  <tr>
    <td colspan="5" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="content"><table width="835" border="0">
      <tr>
        <td width="195" bgcolor="#E6E6E6" class="content"><div align="center" style="font-weight: bold">
          <div align="left">First Name</div>
          </div></td>
        <td width="636" bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
$username = $_SESSION['username'];
	
// select details from database for the current user
$sql=("SELECT * FROM customer WHERE username = '$username'");
$result = mysql_query($sql);

$value = mysql_fetch_assoc($result);
$sessionfirstname   = $value['firstname'];

echo $sessionfirstname;
?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left" style="font-weight: bold">Last Name</div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
$username = $_SESSION['username'];
	
// select details from database for the current user
$sql=("SELECT * FROM customer WHERE username = '$username'");
$result = mysql_query($sql);

$value = mysql_fetch_assoc($result);
$sessionlastname 	= $value['lastname'];

echo $sessionlastname;
?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Company Name</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
$username = $_SESSION['username'];
	
// select details from database for the current user
$sql=("SELECT * FROM customer WHERE username = '$username'");
$result = mysql_query($sql);

$value = mysql_fetch_assoc($result);
$sessioncompanyname = $value['companyname'];

echo $sessioncompanyname;
?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Position</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
$username = $_SESSION['username'];
	
// select details from database for the current user
$sql=("SELECT * FROM customer WHERE username = '$username'");
$result = mysql_query($sql);

$value = mysql_fetch_assoc($result);
$sessionposition 	= $value['position'];

echo $sessionposition;
?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Address</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
$username = $_SESSION['username'];
	
// select details from database for the current user
$sql=("SELECT * FROM customer WHERE username = '$username'");
$result = mysql_query($sql);

$value = mysql_fetch_assoc($result);
$sessionaddress 	= $value['address'];

echo $sessionaddress;
?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Country</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
$username = $_SESSION['username'];
	
// select details from database for the current user
$sql=("SELECT * FROM customer WHERE username = '$username'");
$result = mysql_query($sql);

$value = mysql_fetch_assoc($result);
$sessioncountry 	= $value['country'];

echo $sessioncountry;
?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Contact No.</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
$username = $_SESSION['username'];
	
// select details from database for the current user
$sql=("SELECT * FROM customer WHERE username = '$username'");
$result = mysql_query($sql);

$value = mysql_fetch_assoc($result);
$sessioncontactno 	= $value['contactno'];

echo $sessioncontactno;
?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Email ID</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
$username = $_SESSION['username'];
	
// select details from database for the current user
$sql=("SELECT * FROM customer WHERE username = '$username'");
$result = mysql_query($sql);

$value = mysql_fetch_assoc($result);
$sessionemail 		= $value['email'];

echo $sessionemail;
?>
          </div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="6" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
<?php ob_flush();?>