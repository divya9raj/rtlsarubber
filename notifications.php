<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTLSA_Rubbers</title>
</head>
<?php error_reporting (E_ALL ^ E_NOTICE); ?><?php ob_start();?>
<?php include 'site_header.php';?>
<table width="1018" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="172" rowspan="7" class="content"><p align="left">&nbsp;</p>
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
    <td width="835" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="-3" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="-3" class="content"><FORM><INPUT TYPE="button" VALUE="Back" class="buttons" onClick="history.go(-1);return true;"></FORM>

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
    <td colspan="-3" class="content"><span class="page_title">Notifications</span></td>
  </tr>
  <tr>
    <td colspan="-3" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="-3" bgcolor="#F0F0F0" class="content"><div align="left" class="customer_menu">
      <?php
$username = $_SESSION['username'];
// select details from database for the current user
$sql=("SELECT enquiryID FROM enquiry WHERE username = '$username' && notify='1'");
$result = mysql_query($sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
while($value = mysql_fetch_assoc($result))
{
$enqid  = $value['enquiryID'];

echo "Enquiry ID:&nbsp;&nbsp;";
echo "<a href='requested_details.php?enqid=$enqid&ust=cust'>$enqid</a><br>"; 
}
?>
    </div></td>
  </tr>
  <tr>
    <td colspan="-3" bgcolor="#FFFFFF" class="content"><form name="form1" method="post" action="">
      <input name="clear" type="submit" class="buttons" id="clear" value="Clear Notifications">
  </form>

    <?php
      $user = $_SESSION['username'];
 
  if(isset($_POST['clear']))
 
 {
     mysql_connect("localhost","root","test123") or die(mysql_error());
     mysql_select_db("rtlsa") or die (mysql_error());
     mysql_query("UPDATE enquiry SET notify ='0' WHERE username=\"$user\"");
     if(mysql_affected_rows()< 1)
     echo 'Could Not Process Form in enq part'.mysql_error();
	 mysql_query("UPDATE customer SET notify ='0' WHERE username=\"$user\"");
	 if(mysql_affected_rows()< 1)
     echo 'Could Not Process Form in customer part'.mysql_error();
    
}
?>
    </p>
    
<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
