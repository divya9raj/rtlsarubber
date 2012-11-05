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
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="172" bgcolor="#FFFFFF" class="content">&nbsp;</td>
    <td width="177" bgcolor="#FFFFFF" class="content"><span class="page_title">Order Update</span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="messages">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
    <td bgcolor="#F0F0F0" class="messages">

<?php
session_start();

if(isset($_POST['updateorder']) && (!(isset($_POST['quantity']))))
{
  include_once('/enquiry.class.php');
  $updateorder = new Order();

  if($updateorder->process_order())
    echo "Order Status Successfully Updated!&nbsp;<a href='customer_index.php'>Return to Customer Page</a><br>";
  else
    $updateorder->show_errors();
} 

?>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
    <td bgcolor="#F0F0F0" class="content"><form name="form1" method="post" action="">
      <table width="834">
        <tr>
          <td><p class="content">Select Your Option and Submit</p>
<?php
include('/employee.class.php');
$ust=$_GET['ust'];
$enqid = $_GET['enqid'];
$login = new Employee();
$user = $_SESSION['username'];
mysql_connect("localhost","root","test123") or die(mysql_error());
mysql_select_db("rtlsa") or die (mysql_error());
if(!($ust == 'cust'))
{
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
$result= mysql_fetch_array($emp_sql);
$enq_result=mysql_fetch_array($enq_sql);
if (! $result&& $enq_result){
  echo 'Database error: ' . mysql_error(); 
}

if ($ust == "cust")
{
      echo '<form id="form2" name="form2" method="post" action="">';
     if(!(isset($_POST['quantity'])))
              {     
      echo '
           <p>If Placing Order, please enter the exact quantity.<br>
          <label for="quantity" class="content">Quantity</label>
          <br />
  <input name="quantity" type="text" class="textbox" id="Quantity" />
          <br />
          <p><input type="radio" name="order" value="EndTask" id="RadioGroup1_2" class="content">
            Reject and End Task</label><p>
        </p>';}
        elseif ( $_POST['order'] == 'EndTask')
        {
            echo 'Are you sure you want to reject and end task this enquiry?<br><p><input type="radio" name="order" value="EndTask" id="RadioGroup1_2" class="content">
            Reject and End Task</label><p>';
        }
        else
        {   
             $quantity = $_POST['quantity'];
             $enqid    =$_GET['enqid'];
            mysql_connect("localhost","root","test123") or die(mysql_error());
            mysql_select_db("rtlsa") or die (mysql_error());
             $sql = "UPDATE enquiry SET eoq= \"$quantity\" WHERE enquiryID=\"$enqid\"";
             mysql_query($sql);
             
   
            $ppq = $_GET['ppq'];
           
           # echo "$ppq"."$quantity";
            $total_price = $ppq * $quantity;
            echo "The total price is $".$total_price;
            echo '<br>';
echo'<input type="radio" name="order" value="OrderPlaced" id="RadioGroup1_0" class="content">
            Place Order </label><p><input type="radio" name="order" value="EndTask" id="RadioGroup1_2" class="content">
            Reject and End Task</label><p>';
      
        }
    echo '</form>';

}

echo '<tr>
            <td width="326"><p>&nbsp;
              </p>
              <p>';
			  if ($ust == "cust")
{

   echo '<input name="updateorder" type="submit" class="buttons" id="submit" value="Submit">';
   
}
}
?>
            </p></td>
        </tr>
      </table>
    </form>    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
    
      </tr>
</table>
