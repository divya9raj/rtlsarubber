<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTLSA_Rubbers</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<style type="text/css">
td img {display: block;}
</style>
</head>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php ob_start();?>
<?php include 'site_header.php';?>
<table width="1018" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
<tr>
  <td colspan="6" class="content">&nbsp;</td>
</tr>
<tr>
  <td width="172" rowspan="6" class="content"><p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left"><br />
      </p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>    <p align="left">&nbsp;</p></td>
  <td width="162" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_index.php">My Profile</a></div></td>
  <td width="165" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_passwordchange.php">Change Password</a></div></td>
  <td width="165" bgcolor="#E2E2E2" class="content"><div align="center"><a href="enquiry_page.php">Make Enquiry</a></div></td>
  <td width="165" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_enquiry.php">Enquiry &amp; Status</a></div></td>
  <td width="163" bgcolor="#E2E2E2" class="content"><div align="center"><a href="customer_order.php">Order &amp; Status</a></div></td>
  </tr>
<tr>
  <td colspan="5" class="content">&nbsp;</td>
</tr>
<tr>
  <td colspan="5" class="content"><?php
session_start();
include('/customer.class.php');

$login = new Customer();
if($login->isLoggedIn())
	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a><br>" ;	
else
	echo ("You must be logged in!");
?></td>
</tr>
<tr>
  <td colspan="5" class="content"><span class="page_title">Enquiry Form</span></td>
</tr>
<tr>
  <td colspan="5" class="content">&nbsp;</td>
</tr>
<tr>
    <td width="835" colspan="5" bgcolor="#F0F0F0" class="content"><p><span class="messages">
      <?php
if(isset($_POST['enquiry']))
{
  include_once('/enquiry.class.php');
  
  $enquiry = new Enquiry();
  if($enquiry->process())
    echo "Successfully Submitted Enquiry! &nbsp;<a href='customer_index.php'>&nbsp;Return to My Profile</a>";
  else
    $enquiry->show_errors();
}
?>
    </span></p>
      <form method="post" action="">
      <table width="836" border="0" align="right" bgcolor="#FFFFFF">
        <tr>
        <td colspan="2" bgcolor="#DFDFDF" class="table-titles">          Basic Requirements</td>
        </tr>
      <tr>
        <td width="331" bgcolor="#F0F0F0" class="table-titles"><div align="left">Type of enquiry requirement </div></td>
        <td width="495" bgcolor="#F0F0F0" class="table-titles"><label><span class="textbox">
          <input type="radio" name="enquiryType" value="On-Off" id="enquiryType_0" />
          On-Off</span></label>
          <span class="form_helptools">(regular)</span><span class="textbox">
<label>
  <input type="radio" name="enquiryType" value="One-Off" id="enquiryType_1" />
  One-Off</label>
            </span>
          <label><span class="form_helptools">(one-time)</span></label><label></label></td>
      </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles"><div align="left">Type of required rubber<br />
          </label>
          </div></td>
        <td bgcolor="#F5F5F5" class="table-titles"><select name="rubberType" class="textbox" id="rubberType">
          <option value="Natural Rubber NR" selected="selected">Natural Rubber NR</option>
          <option value="Styrene Butadiene SBR">Styrene Butadiene SBR</option>
          <option value="Neoprene CR">Neoprene CR</option>
          <option value="Nitrile NBR">Nitrile NBR</option>
          <option value="Acrylic">Acrylic</option>
          <option value="Butyl Rubber">Butyl Rubber</option>
          <option value="EPDM Rubber">EPDM Rubber</option>
          <option value="Hypalon">Hypalon</option>
          <option value="Silicone Rubber">Silicone Rubber</option>
          <option value="Viton Rubber">Viton Rubber</option>
          <option value="EPDM Rubber">EPDM Rubber</option>
          <option value="Vamac Rubber">Vamac Rubber</option>
          <option value="Epichlorohydrin Rubber">Epichlorohydrin Rubber</option>
          <option value="Fluorosilicone Rubber">Fluorosilicone Rubber</option>
          </select></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="table-titles"><div align="left">Rubber Hardness</div></td>
        <td bgcolor="#F0F0F0" class="table-titles"><input name="hardness" type="text" class="textbox" id="hardness" size="20.5" />
          <label class="content">in degree</label></td>
      </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles"><div align="left">Tensile Strength </div></td>
        <td bgcolor="#F5F5F5" class="table-titles"><input name="tensilestrength" type="text" class="textbox" id="tensilestrength" size="20.5" />
          <span class="content">in        P.S.I</span></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="table-titles"><div align="left">Specify Elongation</div></td>
        <td bgcolor="#F0F0F0" class="table-titles"><input name="elongation" type="text" class="textbox" id="elongation" size="20.5" />
          <span class="content">in %</span></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="table-titles"><div align="left">Rubber Density</div></td>
        <td bgcolor="#F5F5F5" class="table-titles"><input name="density" type="text" class="textbox" id="density" size="20.5" />
          <span class="content">          in kg/m³</span></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="table-titles"><div align="left">Choose Type of Transparency</div></td>
        <td bgcolor="#F0F0F0" class="table-titles"><select name="transparency" class="textbox" id="transparency">
          <option value="Transparent">Transparent</option>
          <option value="Translucent">Translucent</option>
          <option value="Opaque">Opaque</option>
          </select></td>
      </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles"><div align="left">Waterproof Property</div></td>
        <td bgcolor="#F5F5F5" class="table-titles"><label><span class="textbox">
          <input type="radio" name="waterproof" value="Yes" id="waterproof_2" />
          Yes</span></label>
          <span class="textbox">
            <label>
              <input type="radio" name="waterproof" value="No" id="waterproof_3" />
              No</label>
            </span>
          <label></label></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="table-titles"><div align="left">Size Required (per piece; mm)</div></td>
        <td bgcolor="#F0F0F0" class="table-titles"><input name="size" type="text" class="textbox" id="size" size="20.5" />
          <span class="content">(length, width, thickness)</span></td>
      </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles"><div align="left">Volume/Range of quantity required</div>
          <label></label></td>
        <td bgcolor="#F5F5F5" class="table-titles"><label for="quantity"></label>
          <select name="quantity" class="textbox" id="quantity">
            <option value="&lt; 1000 pieces" selected="selected">&lt; 1000 pieces</option>
            <option value="&lt; 10,000 pieces">&lt; 10,000 pieces</option>
            <option value="&lt; 100,000 pieces">&lt; 100,000 pieces</option>
            <option value="&gt; 100,000 pieces">&gt; 100,000 pieces</option>
          </select></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#FFFFFF" class="table-titles">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#DFDFDF" class="table-titles">Resistances Requirements (where applicable)</td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="table-titles">Heat Resistance (Temperature)</td>
        <td bgcolor="#F0F0F0" class="table-titles"><span class="textbox">
          <input name="heatresistance" type="text" class="textbox" id="heatresistance" size="20.5" />
        in Celcius</span></td>
      </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles">Water Resistance</td>
        <td bgcolor="#F5F5F5" class="textbox"><label>
          <input type="checkbox" name="waterresistance" value="Yes" id="waterresistance_0" />
          Yes
        </label>
          <label>
            <input type="checkbox" name="waterresistance" value="No" id="waterresistance_1" />
            No
          </label></td>
      </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles">Oil Resistance</td>
        <td bgcolor="#F0F0F0" class="textbox"><label>
          <input type="checkbox" name="oilresistance" value="Yes" id="waterresistance_4" />
          Yes
        </label>
          <label>
            <input type="checkbox" name="oilresistance" value="No" id="waterresistance_5" />
            No
          </label></td>
      </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles">Tear &amp; Abrasion Resistance</td>
        <td bgcolor="#F5F5F5" class="textbox"><label>
          <input type="checkbox" name="tearabrasionresistance" value="Yes" id="waterresistance_4" />
          Yes
        </label>
          <label>
            <input type="checkbox" name="tearabrasionresistance" value="No" id="waterresistance_5" />
            No
          </label></td>
        </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles">Ozone/Weather Resistance</td>
        <td bgcolor="#F0F0F0" class="textbox"><label>
          <input type="checkbox" name="ozoneweatherresistance" value="Yes" id="waterresistance_4" />
          Yes
        </label>
          <label>
            <input type="checkbox" name="ozoneweatherresistance" value="No" id="waterresistance_5" />
            No</label></td>
        </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles">Fuel Resistance</td>
        <td bgcolor="#F5F5F5" class="textbox"><label>
          <input type="checkbox" name="fuelresistance" value="Yes" id="waterresistance_4" />
          Yes
        </label>
          <label>
            <input type="checkbox" name="fuelresistance" value="No" id="waterresistance_5" />
            No
          </label></td>
        </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles">Exposure to any chemicals</td>
        <td bgcolor="#F0F0F0" class="table-titles"><span class="textbox" id="chemical">
          <input name="chemicalexposure" type="text" class="textbox" id="chemicalexposure" value="" size="20.5" />
        </span></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#FFFFFF" class="table-titles">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#DFDFDF" class="table-titles">Additional Requirements</td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0" class="table-titles"><div align="left">Please send me <br />
          <br />
          <br />
          <br />
          </div></td>
        <td bgcolor="#F0F0F0" class="table-titles"><label class="textbox">
          <input name="sendDetails[]" type="checkbox" id="sendDetails" value="Price per quantity" />
          Price per quantity<br />
          </label>
          <label>
            <span class="textbox">
            <input name="sendDetails[]" type="checkbox" id="sendDetails" value="Sample Availability" />
            </span></label>
          <span class="textbox">            Sample Availability<br />
            <label>
              <input name="sendDetails[]" type="checkbox" id="sendDetails" value="Delivery Time" />
            </label>
            Delivery Time (Sample)<br />
            <label>
              <input name="sendDetails[]" type="checkbox" id="sendDetails" value="Price Per Quantity, Sample Availability, Delivery Time" />
            </label>
            All of the above            </span><br />
          </span></td>
      </tr>
      <tr>
        <td bgcolor="#F5F5F5" class="table-titles"><div align="left">Other requirements/details<br />
                <br />
                <br />
        </div></td>
        <td bgcolor="#F5F5F5" class="table-titles"><label>
          <textarea name="others" id="others" cols="33" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="table-titles">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="table-titles">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="table-titles">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="table-titles"><div align="left">
            <input name="enquiry" type="submit" class="buttons" id="Submit" value="Submit Form" />
            <input name="reset" type="reset" class="buttons" id="Reset" value="Reset Form" />
        </div></td>
      </tr>
  </table>
      <br />
    </form></td>
  </tr>
<tr>
  <td colspan="6" class="content">&nbsp;</td>
</tr>
<tr>
  <td colspan="6" bgcolor="#CCCCCC" class="content"><div align="center"><small>Copyright 2011-2012 Divya (RTLSA_Rubbers) </small></div></td>
  </tr>
</table>
</body>
</html>