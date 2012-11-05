<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php ob_start();?>
<?php include 'site_header.php';?>
<table width="1018" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td width="172" rowspan="6" class="content">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="content">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="content"><?php
session_start();
include('/employee.class.php');

$login = new Employee();
if($login->isLoggedIn())
{
  	echo "Welcome, ".$_SESSION['username']."!&nbsp;<a href='site_logout.php'>Log Out</a>&nbsp;&nbsp;<a href='employee_enquiry.php'>View Enquiries</a>&nbsp;&nbsp;<a href='search_recipe.php'>Search Recipe</a>&nbsp;&nbsp;<a href='create_recipe.php'>Create Recipe</a><br>" ;
	$user = $_SESSION['username'];
}	
else
	echo ("You must be logged in!");
?></td>
  </tr>
  <tr>
    <td width="836" bgcolor="#FFFFFF" class="content"><span class="page_title">Search Recipe-Solution</span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="dividers">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#F5F5F5" class="content"><?php
$user = $_SESSION['username'];
$emp_sql = mysql_query("SELECT * from employee WHERE username = '$user'");
$result= mysql_fetch_array($emp_sql);

$staff_Type = $result['staffType'];
if ($staff_Type == "InvestigatingEngineer" || (isset($_POST['search_recipe'])))
{
    echo'<p>Would you like to search recipe for this enquiry? Click the Search Recipe button</p>';
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
   echo "<br>Create new recipe?&nbsp;<a href='create_recipe.php'>Create Recipe</a>"; 
 }
    while ($row = mysql_fetch_array($sql))
{
	$rid = $row['recipeid'];
	$rubberType = $row ['rubberType'];
    $compounds = $row['compounds'];
    //echo "<b>$rubberType<b><p>";
	echo "Ingredients<br>$compounds";
	echo "<p>Or create new recipe?&nbsp;<a href='create_recipe.php'>Create Recipe</a>"; 
    
 }
}
?>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#F5F5F5" class="messages">&nbsp;</td>
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
