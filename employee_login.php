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
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="172" rowspan="3">&nbsp;</td>
    <td><span class="page_title">Employee Login </span></td>
  </tr>
  <tr>
    <td bgcolor="#F5F5F5" class="error-messages"><?php
session_start();
if(isset($_POST['login']))
{
  include('/employee.class.php');
  $login = new Employee();

  if($login->isLoggedIn())
     header('location: employee_page.php');
  else
    $login->showErrors();
}

?></td>
  </tr>
  <tr>
    <td width="836" bgcolor="#F5F5F5"><form method="post" action="">
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <p><span class="form-labels"><br />
                Username </span>
                <input name="username" type="text" class="textbox" size="40" />
                </p>
              <p><span class="form-labels">Password<br />
                </span>
                <input name="password" type="password" class="textbox" size="40" />
                </p>
              <p>
                <input name="login" type="submit" class="buttons" value="Sign In" />
                </p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      <br />
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
</p>

<?php ob_flush();?>
<script type="text/javascript">
</script>
</body>
</html>