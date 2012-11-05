<?php

class Order
{
  private $enquiryType;
  private $customerid;
  private $ust;	
  private $status;
  private $enqid;
  private $orderid;
  private $datetime;
  private $tstamp;
  private $maxtime;
  private $currtime;
  private $priceperquantity;
  private $sample;
  private $deliverytime;
  private $result;
  private $sql_enq;

  private $errors;
  
   public function __construct()
  {
    $this->errors = array();
	if(isset($_POST['updateorder']))
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
	}
  }
  
  public function filter($var)
  {
    return preg_replace('/[^a-zA-Z0-9@.]/','',$var);
  }
  
   public function show_errors()
  {
    echo "<h3>Error</h3>";

    foreach($this->errors as $key=>$value)
      echo $value."<br>";
  }
  
   public function process_order()
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
  }
}
?>