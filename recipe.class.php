<?php

class Recipe
{
	private $rubberType;
	private $compounds;
	private $recipeid;
	private $status;
    private $customerid;
	private $enqid;
	private $result;
  	private $sql_enq;
	
	private $errors;

  public function __construct()
  {
    $this->errors = array();
	
	if(isset($_POST['save_recipeid']))
    {
        $this->customerid = $_SESSION['username'];
        $this->enqid      =$_GET['enqid'];  
        $this->recipeid = $_POST['recipeid'];
        $this->status = $_POST['status'];
           
    }
	
    if(isset($_POST['createrecipe']))
    { 
        $this->rubberType = $_POST['rubberType'];
        $this->compounds = $_POST['compounds'];      
    }
  }
  
  public function process_recipeid()
  { 
         $this->save_recipeid();

    return count($this->errors)? 0 : 1;
  }
  
  public function create_recipe()
  { 
         $this->createrecipe();

    return count($this->errors)? 0 : 1;
  }
  
   public function save_recipeid()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());

   mysql_query("UPDATE enquiry SET  recipeid= \"$this->recipeid\", status=\"$this->status\" WHERE enquiryID=\"$this->enqid\""); 
 
   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form'.mysql_error();
   
    $this->sql_enq       = mysql_query("SELECT * from enquiry WHERE enquiryID = '$this->enqid'");
    $this->result        = mysql_fetch_array($this->sql_enq);
    if (! $this->result){
    echo 'Database error: ' . mysql_error();
	
	if(mysql_affected_rows()< 1)
    $this->errors[] = 'Could Not Process Form';
	}
  }
  
  public function createrecipe()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());

   mysql_query("INSERT INTO recipes(rubberType, compounds) VALUES ('{$this->rubberType}','{$this->compounds}')");

   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form';
  }
 
  public function show_errors()
  {
    echo "<h3>Errors</h3>";

    foreach($this->errors as $key=>$value)
      echo $value."<br>";
  }
}
?>
  