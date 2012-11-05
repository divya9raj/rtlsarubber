<?php

class Customer
{
  private $_username;
  private $_password;
  private $_passmd5;

  private $_errors;
  private $_access;
  private $_login;
  
  private $salutation;
  private $firstname;
  private $lastname;
  private $companyname;
  private $position;
  private $address;
  private $country;
  private $contactno;
  private $email;
  private $username;
  private $password;
  private $repeatpassword;
  private $passmd5;


  public function __construct()
  {
    $this->_errors = array();
	if (!(isset($_POST['register'])))
	{
    $this->_login  = isset($_POST['login'])? 1 : 0;
    $this->_access = 0;

    $this->_username = ($this->_login)? $_POST['username'] : $_SESSION['username'];
    $this->_password = ($this->_login)? $_POST['password'] : '';
    $this->_passmd5  = ($this->_login)? md5($this->_password) : $_SESSION['password'];
  }
  
  if (isset($_POST['register']))
  {
	$this->errors = array();
	
	$this->salutation    		= $this->filter($_POST['salutation']);
	$this->firstname     		= $this->filter($_POST['firstname']);
	$this->lastname      		= $this->filter($_POST['lastname']);
	$this->companyname   		= $_POST['companyname'];
	$this->position      		= $_POST['position'];
	$this->address       		= $_POST['address'];
	$this->country       		= $_POST['country'];
	$this->contactno     		= $this->filter($_POST['contactno']);
	$this->email         		= $this->filter($_POST['email']);
    $this->username      		= $this->filter($_POST['username']);
    $this->password      		= $this->filter($_POST['password']);
	$this->repeatpassword      	= $this->filter($_POST['repeatpassword']);

    $this->passmd5       		= md5($this->password);
	  }
  }
  
  public function isLoggedIn()
  {
    ($this->_login)? $this->verifyPost() : $this->verifySession();

    return $this->_access;
  }

  public function verifyPost()
  {
    try
    {
      if(!$this->isDataValid())
         throw new Exception('Please enter Username and Password!');

      if(!$this->verifyDatabase())
         throw new Exception('Incorrect Username/Password');

    $this->_access = 1;
    $this->registerSession();
    }
    catch(Exception $e)
    {
      $this->_errors[] = $e->getMessage();
    }
  }

  public function verifySession()
  {
    if($this->sessionExist() && $this->verifyDatabase())
       $this->_access = 1;
  }

  public function verifyDatabase()
  {
    //Database Connection Data
    mysql_connect("localhost", "root", "test123") or die(mysql_error());
    mysql_select_db("rtlsa") or die(mysql_error());

    $data = mysql_query("SELECT * FROM customer WHERE username = '{$this->_username}' AND password = '{$this->_passmd5}'");

    if(mysql_num_rows($data))
      {
        list($this->_id) = @array_values(mysql_fetch_assoc($data));
        return true;
      }
    else
      { return false; }
	  
	echo $this->_username;
	echo $this->_passmd5;
	echo $this->login;
  }

  public function isDataValid()
  {
    return (preg_match('/^[a-zA-Z0-9_.]{5,12}$/',$this->_username) && preg_match('/^[a-zA-Z0-9]{5,12}$/',$this->_password))? 1 : 0;
  }

  public function registerSession()
  {
    $_SESSION['username'] = $this->_username;
    $_SESSION['password'] = $this->_passmd5;
  }

  public function sessionExist()
  {
    return (isset($_SESSION['username']) && isset($_SESSION['password']))? 1 : 0;
  }

  public function showErrors()
  {
    echo "<h3>Login Error</h3>";

    foreach($this->_errors as $key=>$value)
      echo $value."<br>";
  }

  public function process()
  {
    if($this->valid_data())
         $this->register();

    return count($this->errors)? 0 : 1;
  }

  public function filter($var)
  {
    return preg_replace('/[^a-zA-Z0-9@.]/','',$var);
  }

  public function register()
  {
   mysql_connect("localhost","root","test123") or die(mysql_error());
   mysql_select_db("rtlsa") or die (mysql_error());

   mysql_query("INSERT INTO customer(salutation, firstname, lastname, companyname, position, address, country, contactno, email, username, password) VALUES ('{$this->salutation}','{$this->firstname}','{$this->lastname}','{$this->companyname}','{$this->position}','{$this->address}','{$this->country}','{$this->contactno}','{$this->email}','{$this->username}','{$this->passmd5}')");
   
   if(mysql_affected_rows()< 1)
     $this->errors[] = 'Could Not Process Form';
  }

  public function user_exists()
  {
    mysql_connect("localhost","root","test123") or die(mysql_error());
    mysql_select_db("rtlsa") or die (mysql_error());

    $data = mysql_query("SELECT * FROM customer WHERE username = '{$this->username}'");

    return mysql_num_rows($data)? 1 : 0;
  }

  public function show_errors()
  {
    echo "<h3>Registration Error</h3>";

    foreach($this->errors as $key=>$value)
      echo $value."<br>";
  }

  public function valid_data()
  {
    if($this->user_exists())
      $this->errors[] = 'Username Already Taken';
	if(empty($this->salutation))
      $this->errors[] = 'Please enter Salutation';
	if(empty($this->firstname))
      $this->errors[] = 'Please enter First Name';
	if(empty($this->lastname))
      $this->errors[] = 'Please enter Last Name';
	if(empty($this->companyname))
      $this->errors[] = 'Please enter Company Name';
	if(empty($this->position))
      $this->errors[] = 'Please enter Position';
	if(empty($this->address))
      $this->errors[] = 'Please enter Address';
	if(empty($this->country))
      $this->errors[] = 'Please enter Country';
	if(empty($this->contactno))
      $this->errors[] = 'Please enter ContactNo';
    if(empty($this->email))
      $this->errors[] = 'Please enter Email';
    if(empty($this->username))
      $this->errors[] = 'Invalid Username';
    if(empty($this->password))
      $this->errors[] = 'Invalid Password';

  return count($this->errors)? 0 : 1;
  }
}

?>

