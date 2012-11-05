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
    <td width="172" rowspan="7" class="content">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content"><FORM><INPUT TYPE="button" VALUE="Back To Previous Page" class="buttons" onClick="history.go(-1);return true;"></FORM></td>
  </tr>
  <tr>
    <td width="177" bgcolor="#FFFFFF" class="content"><span class="page_title">Enquiry  Update</span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="customer_menu">Select Option and Submit</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0" class="messages"><?php
session_start();
if(isset($_POST['updatestatus']))
{
  include_once('/enquiry.class.php');
  $updatestatus = new Enquiry();

  if($updatestatus->process_status())
    echo "Enquiry Successfully Updated!&nbsp;<a href='employee_enquiry.php'>Return to Main Page</a><br>";
  else
    $updatestatus->show_errors();
	}
if(isset($_POST['search_recipe']))
{
  /*include_once('/enquiry.class.php');
  $search_recipe = new Enquiry();

  if($search_recipe->search_solution())
         
    echo "Success!";
  else
    $search_recipe->show_errors();*/
    mysql_connect("localhost","root","test123") or die(mysql_error());
     mysql_select_db("rtlsa") or die (mysql_error());
   
    $enqid=$_GET['enqid'];
    $sql_enq       = mysql_query("SELECT * from enquiry WHERE enquiryID = '51'");
    $result        = mysql_fetch_array($sql_enq);
    if (! $result){
    echo 'Database error: ' . mysql_error();
} 
    $rubberType    = $result['rubberType'];
   
    $sql           = mysql_query("SELECT * from recipes WHERE rubberType = '$rubberType'");
   
    while ($row = mysql_fetch_array($sql))
{
	$rid = $row['recipeid'];
    $compounds = $row['compounds'];
    echo "$rid"." "."$compounds";
}
    
	}    
/*if(isset($_POST['create_recipe']))
{
    mysql_connect("localhost","root","test123") or die(mysql_error());
    mysql_select_db("rtlsa") or die (mysql_error());
   
    $enqid=$_GET['enqid'];
    $sql_enq       = mysql_query("INSERT INTO recipes(recipeid, rubbername, compounds) VALUES ('{$this->recipeid}','{$this->rubbername}','{$this->compounds}')");
	
    $result        = mysql_fetch_array($sql_enq);
    if (! $result){
    echo 'Database error: ' . mysql_error();
}   
	}*/   
	
if(isset($_POST['updateorder']) && (!(isset($_POST['quantity']))))
{
  include_once('/order.class.php');
  $updateorder = new Order();

  if($updateorder->process_order())
    echo "Successfull!&nbsp;<a href='customer_index.php'>Return to Customer Page</a><br>";
  else
    $updateorder->show_errors();
} 


if(isset($_POST['add_details']))
{
  include_once('/enquiry.class.php');
  $add_details = new Enquiry();

  if($add_details->process_details())
    echo "Enquiry Updated Successfully!&nbsp;<a href='employee_enquiry.php'>Return to Main Page</a><br>";
  else
    $add_details->show_errors();
}  

if(isset($_POST['save_recipeid']))
{
  include_once('/recipe.class.php');
  $save_recipeid = new Recipe();

  if($save_recipeid->process_recipeid())
    echo "Success!&nbsp;<a href='employee_enquiry.php'>Return to Main Page</a><br>";
  else
    $save_recipeid->show_errors();
}  
?>
&nbsp;  <tr>
    <td bgcolor="#F0F0F0" class="content"><form name="form1" method="post" action="">
      <table width="834">
        <tr>
          <td class="content"><p class="content">
            <span class="content">
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

$staff_type = $result['staffType'];
$status = $enq_result['status'];
if ($staff_type == "CommercialManager" && ($status == "Available" or $status == "NotAvailable"))
{
echo '<input type="radio" name="status" value="Approved" id="RadioGroup1_0" class="content">
            Enquiry Approved</label><p><input type="radio" name="status" value="Disapproved" id="RadioGroup1_2" class="content">
            Disapprove Enquiry</label><p><form id="form2" name="form2" method="post" action="">
      <p>If Approving Enquiry, please fill the form below as requested upon the enquiry.<br>
          <label for="priceperquantity" class="content">Price Per Quantity</label>
          <br />
  <input name="priceperquantity" type="text" class="textbox" id="priceperquantity" />
          <br />
          <br />
          <label for="sample" class="content">Sample Availability</label>
          <br />
          <input name="sample" type="text" class="textbox" id="sample" />
          <br /> 
  <br />
          <label for="deliverytime" class="content">Expected Delivery Time of the Sample</label>
          <br />
          <input name="deliverytime" type="text" class="content" id="deliverytime" />
        </p>
    </form>';
}
/*if ($staff_type == "CommercialManager" && $status == "NotAvailable")
{
echo '<tr><td><label>
              <input type="radio" name="status" value="Disapproved" id="RadioGroup1_2" class="content">
            Disapprove Enquiry</label></td>
          </tr>';
}*/
if ($staff_type == "CommercialManager" && $status == "Open")
{
echo '<input type="radio" name="status" value="Assigned" id="RadioGroup1_0" class="content">
            Assign to Investigating Engineer</label><p><input type="radio" name="status" value="Rejected" id="RadioGroup1_2" class="content">
            Reject Enquiry</label></td>
          </tr>';
}
if ($staff_type == "InvestigatingEngineer")
{
echo '        <input type="radio" name="status" value="Available" id="RadioGroup1_0" class="content">
            Solution Available for Enquiry</label><br><label for="recipeid" class="content">If available, please enter Recipe ID</label>
          <br />
  <input name="recipeid" type="text" class="textbox" id="RecipeID" />
          <br /><p><input type="radio" name="status" value="NotAvailable" id="RadioGroup1_2" class="content">
            Solution Not Available for Enquiry</label></td>
          </tr>';
}
}
if ($ust == "cust")
{
      echo '<form id="form2" name="form2" method="post" action="">';
     if(!(isset($_POST['quantity'])))
              {     
      echo '
           <p>If Placing Order, please enter the exact quantity and click submit.<br>
          <label for="quantity" class="content">Exact Quantity</label>
          <br />
  <input name="quantity" type="text" class="textbox" id="Quantity" />
          <br />
          <p>If Ending the Task, please select Reject and End Task option and click submit.<br><input type="radio" name="order" value="EndTask" id="RadioGroup1_2" class="content">
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
           
            $total_price = $ppq * $quantity;
            echo "The total price is $"."$total_price.00";
			echo "<p>Would you like to place order?";
            echo '<br>';
echo'<input type="radio" name="order" value="OrderPlaced" id="RadioGroup1_0" class="content">
            Place Order </label><p><input type="radio" name="order" value="EndTask" id="RadioGroup1_2" class="content">
            Reject and End Task</label><p>';
      
        }
    echo '</form>';

}

echo '<tr>
            <td width="326"><p>&nbsp;
              </p>';
if(!($ust == "cust"))
{			  
    if ($staff_type == "CommercialManager" && $status == "Available")
    {        
        echo '<input name="add_details" type="submit" class="buttons" id="submit" value="Submit">';                      
    }
	
	elseif ($staff_type == "InvestigatingEngineer")
	{
		echo '<input name="save_recipeid" type="submit" class="buttons" id="submit" value="Submit">';       
	}
    else
    {
    
  echo '<input name="updatestatus" type="submit" class="buttons" id="submit" value="Submit">';
  }
  }
else if ($ust == "cust")
{

   echo '<input name="updateorder" type="submit" class="buttons" id="submit" value="Submit">';
   
}
?>
            </span></p>
            <span class="content">
            </p>
<p class="content">&nbsp;</p></td>
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
    <td colspan="2" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
    
  </tr>
</table>
