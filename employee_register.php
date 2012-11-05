<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTLSA_Rubbers</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<?php ob_start();?>
<?php include 'site_header.php';?>

<table width="1018" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="171" rowspan="4" class="content">&nbsp;</td>
    <td class="content"><span class="page_title">Employee Registration Form</span></td>
  </tr>
  <tr>
    <td class="messages">&nbsp;</td>
  </tr>
  <tr>
    <td width="837" class="messages">
      
  <?php
session_start();
if(isset($_POST['register']))
{
  include_once('/employee.class.php');
  $register = new Register();

  if($register->process())
    echo "Successfully Registered!";
  else
    $register->show_errors();
}

?></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0" class="content"><form method="post" action="">
      
      <table width="835">
        <tr>
          <td width="184" bgcolor="#E6E6E6" class="form-labels"><div align="left">Username</div></td>
          <td width="639" bgcolor="#E6E6E6">
            <input name="staffuser" type="text" class="textbox" id="staffuser"/>
            </td>
          </tr>
        <tr>
          <td bgcolor="#F0F0F0" class="form-labels"><div align="left">Password</div></td>
          <td bgcolor="#F0F0F0">
            <input name="staffpass" type="password" class="textbox" id="staffpass"/></td>
          </tr>
        <tr>
          <td bgcolor="#E6E6E6" class="form-labels"><div align="left">Email ID</div></td>
          <td bgcolor="#E6E6E6"><span id="sprytextfield3">
            <input name="staffemail" type="text" class="textbox" id="staffemail" size="40"/>
            <span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
        <br />
        <tr>
          <td valign="top" bgcolor="#F0F0F0" class="form-labels"><div align="left">Type of Staff</div></td>
          <td bgcolor="#F0F0F0"><table width="244">
            <tr>
              <td width="236"><label> <span class="textbox">
                <input type="radio" name="staffType" value="Commercial Manager" id="stafftype_0" />
                Commercial Manager</span></label></td>
              </tr>
            <tr>
              <td><label> <span class="textbox">
                <input type="radio" name="staffType" value="Investigating Engineer" id="stafftype_1" />
                Investigating Engineer</span></label></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td valign="top" bgcolor="#E6E6E6" class="form-labels">&nbsp;</td>
          <td bgcolor="#E6E6E6"><input name="register" type="submit" class="buttons" value="Register"/></td>
          </tr>
        </table>
    </form>    </td>
  </tr>
  <tr>
    <td colspan="2" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {hint:"xxxxx@gmail.com", useCharacterMasking:true});
</script>
</body>
</html>