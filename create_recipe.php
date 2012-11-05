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
<td bgcolor="#FFFFFF" class="content">

<?php
session_start();
include('/employee.class.php');

$login = new Employee();
if($login->isLoggedIn())
{
  	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='employee_enquiry.php'>View Enquiries & Search Recipe</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='create_recipe.php'>Create Recipe</a><br>" ;
	$user = $_SESSION['username'];
}	
else
	echo ("You must be logged in!");
?>

</td>
</tr>
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
</tr>
<tr>
<td width="836" bgcolor="#FFFFFF" class="content"><span class="page_title">Create Recipe-Solution</span></td>
</tr>
<tr>
<td bgcolor="#FFFFFF" class="dividers">&nbsp;</td>
</tr>
<tr>
<td bgcolor="#F5F5F5" class="messages">

<?php
if(isset($_POST['createrecipe']))
{
  include_once('/recipe.class.php');
  
  $createrecipe = new Recipe();
  if($createrecipe->create_recipe())
    echo "Recipe Created Successfully! &nbsp;<a href='employee_enquiry.php'>&nbsp;Return to Enquiry Page</a>";
  else
    $createrecipe->show_errors();
}
?>&nbsp;</td>
</tr>
<tr>
    <td bgcolor="#F5F5F5" class="messages"><form name="form1" method="post" action="">
      <p>
        <label for="rubberType" class="form-labels">Rubber Type</label>
        <br>
        <input name="rubberType" type="text" class="textbox" id="rubberType">
        </p>
      <p class="form-labels">Ingredients and Conditions
        <br>
        <textarea name="compounds" cols="30" rows="5" class="textbox" id="compounds"></textarea>
      </p>
      <p>
        <input name="createrecipe" type="submit" class="buttons" id="submit" value="Create Recipe">
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
    <td colspan="2" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
