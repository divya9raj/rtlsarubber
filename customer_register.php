<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTLSA_Rubbers</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
</head>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php ob_start();?>
<?php include 'site_header.php';?>

<table width="1018" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
<tr>
<td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
</tr>
<tr>
<td width="173" rowspan="4" class="content">&nbsp;</td>
<td bgcolor="#FFFFFF" class="content"><span class="page_title">Customer Registration Form</span></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" class="error-messages">&nbsp;</td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" class="messages"><?php
session_start();
if(isset($_POST['register']))
{
  include_once('/customer.class.php');
  $register = new Customer();

  if($register->process())
  	echo "Successfully Registered! &nbsp;<a href='customer_login.php'>&nbsp;Return to Login Page</a>";
  else
    $register->show_errors();
}

?></td>
</tr>
<tr>
<td width="835" bgcolor="#FFFFFF"><form method="post" action="">
  <table width="835" border="0" align="left" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="table-titles">
    <tr>
      <td colspan="2" bordercolor="#CCCCCC" bgcolor="#DFDFDF" class="register"><div align="left" class="section_title">Personal Details</div></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0" class="register"><div align="left">Salutation:</div></td>
      <td bgcolor="#F0F0F0"><select name="salutation" size="1" class="textbox" id="salutation">
        <option selected="selected">Mr</option>
        <option>Miss</option>
        <option>Mrs</option>
        </select></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F5F5F5" class="register"><div align="left">Your First Name:</div></td>
      <td bgcolor="#F5F5F5"><input name='firstname' type = 'text' class="textbox" id="firstname" size="35" /></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0" class="register"><div align="left">Your Last Name:</div></td>
      <td bgcolor="#F0F0F0"><input name='lastname' type = 'text' class="textbox" id="lastname" size="35" /></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F5F5F5" class="register"><div align="left">Company Name:</div></td>
      <td bgcolor="#F5F5F5"><input name="companyname" type="text" class="textbox" id="companyname" size="35" /></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0" class="register"><div align="left">Your Designation/Position:</div></td>
      <td bgcolor="#F0F0F0"><input name="position" type="text" class="textbox" id="position" size="35" /></td>
      </tr>
    <tr>
      <td colspan="2" bordercolor="#CCCCCC" bgcolor="#DFDFDF" class="section_title"><div align="left">Contact Details</div></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F5F5F5" class="register"><div align="left">Contact Address:</div></td>
      <td bgcolor="#F5F5F5"><input name="address" type="text" class="textbox" id="address" value="" size="35" maxlength="100" />
        <br /></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0" class="register"><div align="left">Country:</div></td>
      <td bgcolor="#F0F0F0"><select name="country" size="1" class="textbox" id="country">
        <option selected="selected">Malaysia</option>
        <option>United Kingdom</option>
        <option>Spain</option>
        <option>Germany</option>
        <option>Switzerland</option>
        <option>France</option>
        <option>Italy</option>
        <option>Sweden</option>
        </select></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F5F5F5" class="register"><div align="left">Contact No: </div></td>
      <td bgcolor="#F5F5F5"><span id="sprytextfield1">
        <input name='contactno' type = 'text' class="textbox" id="contactno" size="35" />
  <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0" class="register"><div align="left">Your E-mail Address:</div></td>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0" class="register"><span id="sprytextfield2">
        <input name='email' type = 'text' class="textbox" id="email" size="35" />
  <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      </tr>
    <tr>
      <td colspan="2" bordercolor="#CCCCCC" bgcolor="#DFDFDF" class="register"><div align="left" class="section_title">
        <div align="left">Account Details</div>
        </div></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F5F5F5" class="register"><div align="left">Choose a username: </div></td>
      <td bordercolor="#CCCCCC" bgcolor="#F5F5F5"><input name='username' type = 'text' class="textbox" id="username" size="35" /></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0" class="register"><div align="left">Choose a password: </div></td>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0"><span id="sprypassword1">
        <input name='password' type = 'password' class="textbox" id="password" size="35" />
        <span class="passwordMinCharsMsg">Minimum number of characters not met(Enter more than 6 characters).</span><span class="passwordMaxCharsMsg">Exceeded maximum number of characters.</span><span class="passwordInvalidStrengthMsg">The password doesn't meet the specified strength.</span></span></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F5F5F5" class="register"><div align="left">Repeat your password: </div></td>
      <td bordercolor="#CCCCCC" bgcolor="#F5F5F5"><input name='repeatpassword' type = 'password' class="textbox" id="repeatpassword" size="35" /></td>
      </tr>
    <tr>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0" class="register">&nbsp;</td>
      <td bordercolor="#CCCCCC" bgcolor="#F0F0F0"><input name='register' type='submit' class="buttons" value='Register Me!' /></td>
      </tr>
    </table>
  <p>&nbsp;</p>
</form>    </td>
</tr>
  <tr>
    <td colspan="2" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
<tr></p>
 <?php ob_flush();?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "phone_number", {format:"phone_custom", pattern:"000-0000-0000", isRequired:false, hint:"000-0000-0000", useCharacterMasking:true});
</script>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {isRequired:false, hint:"xxxxx@gmail.com"});
</script>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {isRequired:false, minChars:6, maxChars:25, minAlphaChars:1, minNumbers:1});
</script>
</body>
</html>
