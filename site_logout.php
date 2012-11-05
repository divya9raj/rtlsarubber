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
<td colspan="2" class="content">&nbsp;</td>
</tr>
<tr>
<td width="173" class="content">&nbsp;</td>
<td width="835" bgcolor="#F0F0F0" class="content">

<?php
session_start();

// this would destroy the session variables
session_destroy();

header('location: site_home.php');
?></td>
</tr>
</table>

<?php ob_flush();?>