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
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><div align="right"><span class="style1"><span class="content">
      New to RTLSA Rubbers?</span> <a href='customer_register.php' class="page-links">Register!</a></span></div></td>
  </tr>
  <tr>
    <td width="173" rowspan="3">&nbsp;</td>
    <td bgcolor="#FFFFFF"><span class="page_title">Customer Login </span></td>
  </tr>
  <tr>
    <td bgcolor="#F5F5F5" class="error-messages"><?php 
session_start();
if(isset($_POST['login']))
{
  include('/customer.class.php');
  $login = new Customer();

  if($login->isLoggedIn())
     header('location: customer_index.php');
  else
    $login->showErrors();
}
?>      <br /></td>
  </tr>
  <tr>
    <td width="835" bgcolor="#F5F5F5"><form method="post" action="">
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
                <br />
                </p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
    </form></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC"><div align="center" class="customer_menu"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
<?php ob_flush();?>