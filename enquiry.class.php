<?php

class Enquiry
{
  private $enquiryType;
  private $rubberType;
  private $hardness;
  private $tensilestrength;
  private $elongation;
  private $density;
  private $transparency;
  private $waterproof;
  private $size;
  private $quantity;
  private $heatresistance;
  private $waterresistance;
  private $oilresistance;
  private $tearabrasionresistance;
  private $ozoneweatherresistance;
  private $fuelresistance;
  private $chemicalexposure;
  private $sendDetails;
  private $others;
  private $content;
  private $fields;
  private $customerid;
  private $ust;	
  private $status;
  private $enqid;
  private $priceperquantity;
  private $sample;
  private $deliverytime;
  private $result;
  private $sql_enq;

  private $errors;

  public function __construct()
  {
    $this->errors = array();
    if(!( isset($_POST['updatestatus']) || isset ($_POST['add_details'])))
	{ 
	$this->customerid             = $_SESSION['username'];
	$this->enquiryType    		  = $_POST['enquiryType'];
	$this->rubberType     		  = $_POST['rubberType'];	
	$this->hardness   		 	  = $_POST['hardness'];
	$this->tensilestrength        = $_POST['tensilestrength'];
	$this->elongation       	  = $_POST['elongation'];
	$this->density       		  = $_POST['density'];
	$this->transparency       	  = $_POST['transparency'];
	$this->waterproof     		  = $_POST['waterproof'];
	$this->size         		  = $_POST['size'];
    $this->quantity      		  = $_POST['quantity'];
	$this->heatresistance      	  = $_POST['heatresistance'];
	$this->waterresistance 		  = $_POST['waterresistance']; 
	$this->oilresistance 		  = $_POST['oilresistance']; 
	$this->tearabrasionresistance = $_POST['tearabrasionresistance'];
	$this->ozoneweatherresistance = $_POST['ozoneweatherresistance'];
	$this->fuelresistance 		  = $_POST['fuelresistance'];
	$this->chemicalexposure 	  = $_POST['chemicalexposure'];
	$this->fields 				  = $_POST['sendDetails']; 
		if (is_array($this->fields)) 
		{  
		for ($i=0;$i<count($this->fields);$i++) 
		{ 
		     if($i == 0)
		     $this->content=$this->fields[$i];
			 elseif ($i>0) 		
			 $this->content = $this->content.",".$this->fields[$i]; 
		} 
	$this->sendDetails =$this->content;
		}
	$this->others      		= $_POST['others'];
	}
	if(isset($_POST['updatestatus']))
	{
	$this->status 	= $this->filter($_POST['status']);
	$this->enqid    = $_GET['enqid'];	 
	}  
	/*if(isset($_POST['updateorder']))
	{
	$this->order 	= $this->filter($_POST['order']);
	$this->enqid    = $_GET['enqid'];
    $this->customerid            = $_SESSION['username'];
    $this->quantity      		  = $_POST['quantity'];	 
	}
    if(isset($_POST['cancelorder']))
	{
	$this->order 	= "cancelled";   
	
    $this->orderid  = $_GET['orderid'];
    $this->customerid            = $_SESSION['username'];	 
	}*/
    if(isset($_POST['add_details']))
    {
        $this->customerid = $_SESSION['username'];
        $this->enqid      =$_GET['enqid'];  
        $this->priceperquantity = $_POST['priceperquantity'];
        $this->sample = $_POST['sample'];
        $this->deliverytime = $_POST['deliverytime'];
        $this->status = $_POST['status'];
           
    }
	
	  /*if(isset($_POST['save_recipeid']))
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
    }*/
            
  }
  public function process()
  {
    if($this->valid_data())
         $this->enquiry();

    return count($this->errors)? 0 : 1;
  }
   public function process_details()
  { 
         $this->add_details();

    return count($this->errors)? 0 : 1;
  }
    /*public function process_recipeid()
  { 
         $this->save_recipeid();

    return count($this->errors)? 0 : 1;
  }
  public function create_recipe()
  { 
         $this->createrecipe();

    return count($this->errors)? 0 : 1;
  }*/

  public function filter($var)
  {
    return preg_replace('/[^a-zA-Z0-9@.]/','',$var);
  }
  
  public function enquiry()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());

   mysql_query("INSERT INTO enquiry(enquiryType, rubberType, hardness, tensilestrength, elongation, density, transparency, waterproof, size, quantity, heatresistance, waterresistance, oilresistance, tearabrasionresistance, ozoneweatherresistance, fuelresistance, chemicalexposure, sendDetails, others, username) VALUES ('{$this->enquiryType}','{$this->rubberType}','{$this->hardness}','{$this->tensilestrength}','{$this->elongation}','{$this->density}','{$this->transparency}','{$this->waterproof}','{$this->size}','{$this->quantity}','{$this->heatresistance}','{$this->waterresistance}','{$this->oilresistance}','{$this->tearabrasionresistance}','{$this->ozoneweatherresistance}','{$this->fuelresistance}','{$this->chemicalexposure}','{$this->sendDetails}','{$this->others}','{$this->customerid}')");

   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form';
  }
  
 /* public function createrecipe()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());

   mysql_query("INSERT INTO recipes(rubberType, compounds) VALUES ('{$this->rubberType}','{$this->compounds}')");

   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form';
  }*/
  
  public function add_details()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());

   mysql_query("UPDATE enquiry SET  priceperquantity= \"$this->priceperquantity\", sample=\"$this->sample\", deliverytime=\"$this->deliverytime\", status=\"$this->status\",notify=1 WHERE enquiryID=\"$this->enqid\""); 
 
   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form'.mysql_error();
   
    $this->sql_enq       = mysql_query("SELECT * from enquiry WHERE enquiryID = '$this->enqid'");
    $this->result        = mysql_fetch_array($this->sql_enq);
    if (! $this->result){
    echo 'Database error: ' . mysql_error();
} 
    $this->cname    = $this->result['username'];

    mysql_query("UPDATE customer SET notify= notify+1 WHERE username=\"$this->cname\"");
   

   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form'. mysql_error();  
     
        
        /*$to = "divisback@gmail.com";
        $subject = "Approval of YOur ENquiry";
        $message = "Hi the details you requsterd for".$this->enqid."are here.\n ppq".$this->priceperquantity."blablabal\n THanks";
        $from = "noreply@rtlsa.com";
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        echo "Mail Sent.";*/
        
  }

  /*public function save_recipeid()
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
}*/

  public function show_errors()
  {
    echo "<h3>Errors</h3>";

    foreach($this->errors as $key=>$value)
      echo $value."<br>";
  }

  public function valid_data()
  {
    if(empty($this->enquiryType))
      $this->errors[] = 'Please select enquiry type';
	if(empty($this->rubberType))
      $this->errors[] = 'Please select the rubber type';
	if(empty($this->hardness))
      $this->errors[] = 'Please enter value for hardness';
	if(empty($this->tensilestrength))
      $this->errors[] = 'Please enter value for tensile strength';
	if(empty($this->elongation))
      $this->errors[] = 'Please enter value for elongation';
	if(empty($this->density))
	$this->errors[] = 'Please enter value for density';
	if(empty($this->transparency))
      $this->errors[] = 'Please select the transparency type';
	if(empty($this->waterproof))
      $this->errors[] = 'Please select the waterproof property';
	if(empty($this->size))
      $this->errors[] = 'Please enter size';
	if(empty($this->quantity))
      $this->errors[] = 'Please enter quantity required';

  return count($this->errors)? 0 : 1;
  }

  public function process_status()
  {
      $this->updatestatus();

    return count($this->errors)? 0 : 1;
  }

  public function updatestatus()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());
   if ($this->status == 'Rejected' or $this->status == 'Disapproved')
   {
    $sql = "UPDATE enquiry SET status= \"$this->status\", notify='1'  WHERE enquiryID=\"$this->enqid\"";
    $this->sql_enq       = mysql_query("SELECT * from enquiry WHERE enquiryID = '$this->enqid'");
    $this->result        = mysql_fetch_array($this->sql_enq);
    if (! $this->result){
    echo 'Database error: ' . mysql_error();
} 
    $this->cname    = $this->result['username'];

    mysql_query("UPDATE customer SET notify= notify+1 WHERE username=\"$this->cname\"");
   }
   else
    $sql = "UPDATE enquiry SET status= \"$this->status\"  WHERE enquiryID=\"$this->enqid\"";
   mysql_query($sql);

   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form'. mysql_error();
   
    
  }
  
  /*public function process_order()
  {   
      if ( $this->order == "OrderPlaced")
      {
      $this->updateorder();
	  }
      else
      $this->orderreject();

    return count($this->errors)? 0 : 1;
  }
  
  public function updateorder()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());
   $enqid=$_GET['enqid'];

   $enq_sql = mysql_query("SELECT * from enquiry WHERE enquiryID = '$enqid'");
   $enq_result= mysql_fetch_array($enq_sql);

   $this->quantity		= $enq_result['eoq'];
   $sql = "UPDATE enquiry SET status= \"$this->order\" WHERE enquiryID=\"$this->enqid\"";
   $order_sql = "INSERT INTO orders(username,enquiryID,status,quantity) VALUES ('{$this->customerid}','{$this->enqid}','OrderPlaced','{$this->quantity}')";
   
   mysql_query($sql);
   mysql_query($order_sql);
   
   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form'. mysql_error();
  }
   
  public function orderreject()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());
   
   $sql = "UPDATE enquiry SET status= \"$this->order\" WHERE enquiryID=\"$this->enqid\"";
 //  $order_sql = "INSERT INTO orders(customerID,enquiryID,status) VALUES ('{$this->customerid}','{$this->enqid}','OrderPlaced')";
   
   mysql_query($sql);
 //  mysql_query($order_sql);
   
   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form'. mysql_error();
  }
  public function cancel_order()
  {   
    mysql_connect("localhost","root","test123") or die(mysql_error());
    mysql_select_db("rtlsa") or die (mysql_error());
    $order_sql = "SELECT * FROM orders WHERE username = '$this->customerid' and orderid = '$this->orderid'";
    $sql = mysql_query($order_sql);
    $enq_result= mysql_fetch_array($sql);
    $this->datetime = $enq_result['datetime'];
    $this->tstamp = strtotime($this->datetime);
    $this->maxtime = $this->tstamp + 86400;
    $this->currtime = time();
    if ( $this->currtime <= $this->maxtime) 
    $this->cancelorder();
    else
    $this->errors[] = 'Maximum time exceeded';
 
    return count($this->errors)? 0 : 1;
  }
  
  public function cancelorder()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());
   
   $sql_find = "SELECT * FROM orders WHERE username = '$this->customerid' and orderid = '$this->orderid'";
   $result_find=mysql_query($sql_find);
   $find = mysql_fetch_array($result_find);
   $this->enqid = $find['enquiryID'];
   
   $sql = "UPDATE enquiry SET status= 'OrderCancelled' WHERE enquiryID=\"$this->enqid\"";
   $order_sql = "DELETE FROM orders WHERE username = '$this->customerid' and orderid = '$this->orderid'";
   
   mysql_query($sql);
   mysql_query($order_sql);
   
   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form'. mysql_error();
  }*/
}
?>