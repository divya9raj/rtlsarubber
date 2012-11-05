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

    <td width="836" bgcolor="#FFFFFF" class="content"><FORM><INPUT TYPE="button" VALUE="Back To Previous Page" class="buttons" onClick="history.go(-1);return true;"></FORM><?php
session_start();
include('/employee.class.php');

$login = new Employee();
$user = $_SESSION['username'];
echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a><br>" ;	
?></td>
</tr>
<tr>
  <td width="836" bgcolor="#FFFFFF" class="content"><span class="page_title">Enquiry Details</span></td>
</tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content"><table width="835" border="0">
      <tr>
        <th width="300" bgcolor="#F0F0F0" class="content" scope="col"><div align="center" style="font-weight: bold">
          <div align="left">Customer</div>
          </div></th>
        <td width="525" bgcolor="#F0F0F0" scope="col"><div align="left" class="content">
          <?php

mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");

$enq_result= mysql_fetch_array($enq_sql);
$custid  		= $enq_result['username'];

echo "<a href='customer_details.php?custid=$custid&ust=staff'>$custid</a><br>";

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="center" style="font-weight: bold">
          <div align="left">Rubber Type</div>
          </div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$rubbertype 	= $enq_result['rubberType'];

echo $rubbertype;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Hardness</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$hardness 		= $enq_result['hardness'];

echo $hardness;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Tensile Strength</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$tensilestrength		= $enq_result['tensilestrength'];

echo $tensilestrength;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Elongation</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$elongation		= $enq_result['elongation'];

echo $elongation;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Density</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$density		= $enq_result['density'];

echo $density;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Transparency</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$transparency		= $enq_result['transparency'];

echo $transparency;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Waterproof</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$waterproof		= $enq_result['waterproof'];

echo $waterproof;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Size</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$size		= $enq_result['size'];

echo $size;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Quantity</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$quantity		= $enq_result['quantity'];

echo $quantity;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Heat Resistance (Temperature)</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$heatresistance		= $enq_result['heatresistance'];

echo $heatresistance;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Water Resistance</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$waterresistance		= $enq_result['waterresistance'];

echo $waterresistance;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Oil Resistance</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$oilresistance		= $enq_result['oilresistance'];

echo $oilresistance;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Tear &amp; Abrasion Resistance</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$tearabrasionresistance		= $enq_result['tearabrasionresistance'];

echo $tearabrasionresistance;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Ozone/Weather Resistance</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$ozoneweatherresistance		= $enq_result['ozoneweatherresistance'];

echo $ozoneweatherresistance;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Fuel Resistance</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$fuelresistance		= $enq_result['fuelresistance'];

echo $fuelresistance;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Exposure to any chemicals</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$chemicalexposure		= $enq_result['chemicalexposure'];

echo $chemicalexposure;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#E6E6E6" class="content"><div align="left"><span style="font-weight: bold">Send Me Details</span></div></td>
        <td bgcolor="#E6E6E6"><div align="left" class="content">
          <?php
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if ( isset($_POST['updateorder']))
{
$ust = $_GET['ust'];
if(!($ust=='cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);
if (! $result){
  echo 'Database error: ' . mysql_error();
}
}
}
$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$senddetails		= $enq_result['sendDetails'];

echo $senddetails;

?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><div align="left"><span style="font-weight: bold">Other Requirements/Details</span></div></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
        
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$others		= $enq_result['others'];

echo $others;
?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><strong>Price Per Quantity</strong></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
        
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$priceperquantity	= $enq_result['priceperquantity'];

echo "$$priceperquantity.00";
?>
        </div></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><strong>Sample Availability</strong></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
        
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$sample		= $enq_result['sample'];

echo $sample;
?>
        </div></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><strong>Delivery Time (Sample)</strong></td>
        <td bgcolor="#F0F0F0"><div align="left" class="content">
          <?php
        
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$deliverytime		= $enq_result['deliverytime'];

echo $deliverytime;
?>
          </div></td>
        </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="content"><strong>Recipe ID</strong></td>
        <td bgcolor="#F0F0F0" class="content"><?php
        
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());

$enqid=$_GET['enqid'];

$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$enq_result= mysql_fetch_array($enq_sql);
$recipeid		= $enq_result['recipeid'];

echo $recipeid;
?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class='content'>&nbsp;</td>
    <td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
  </tr>
<tr>
  <td class='content'>&nbsp;</td>
<?php
$user = $_SESSION['username'];
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);

$staff_Type = $result['staffType'];
if ($staff_Type == "InvestigatingEngineer" || (isset($_POST['search_recipe'])))
{
    echo'<td bgcolor="#E6E6E6" class="content"><p>Would you like to search recipe for this enquiry? Click the Search Recipe button</p>';
	echo'<form id="form2" name="form2" method="post" action="">
    <input name="search_recipe" type="submit" class="buttons" id="submit" value="Search Recipe"><br><br>';
}
  if(isset($_POST['search_recipe']))
 {
    mysql_connect("localhost","root","test123") or die(mysql_error());
    mysql_select_db("rtlsa") or die (mysql_error());
   
    $enqid=$_GET['enqid'];
    $sql_enq       = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
    $result        = mysql_fetch_array($sql_enq);
    if (! $result){
    echo 'Database error: ' . mysql_error();
} 
    $rubberType    = $result['rubberType'];
    $sql           = mysql_query("SELECT * from recipes WHERE rubberType = '$rubberType'");
    $countsql     = mysql_query("SELECT count(recipeid) from recipes WHERE rubberType = '$rubberType'"); 
    $count_row = mysql_fetch_array($countsql);
    $limit     = $count_row['count(recipeid)'];

 if ($limit < 1) 
 {
   echo "No Results Found!";
 }
    while ($row = mysql_fetch_array($sql))
{
	$rid = $row['recipeid'];
	$rubberType = $row ['rubberType'];
    $compounds = $row['compounds'];
    //echo "<b>$rubberType<b><p>";
	echo "<p>Recipe ID:&nbsp;$rid<br>Ingredients & Conditions<br>$compounds";
    
 }
 
}

$ust = $_GET['ust'];
if ( isset($ust) )
{
echo
	"<tr>
	<td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
    <td bgcolor='#FFFFFF' class='content'><a href='enquiry_update.php?enqid=$enqid&ust=$ust&ppq=$priceperquantity'>Click Here</a> to Proceed With Updates</td>
  </tr><tr><td bgcolor='#FFFFFF' class='content'>&nbsp;</td></tr>
    <td colspan='2' bgcolor='#CCCCCC' class='content'><div align='center'><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>   
  </tr>";
}
else 
{
echo
"<tr>
    <td bgcolor='#FFFFFF' class='content'>&nbsp;</td>
  </tr>
</table>";
}
?>
