<?php

class Employee
{
  private $_username;
  private $_password;
  private $_passmd5;

  private $_errors;
  private $_access;
  private $_login;

  public function __construct()
  {
    $this->_errors = array();
    $this->_login  = isset($_POST['login'])? 1 : 0;
    $this->_access = 0;

    $this->_username = ($this->_login)? $_POST['username'] : $_SESSION['username'];
    $this->_password = ($this->_login)? $_POST['password'] : '';
    $this->_passmd5  = ($this->_login)? md5($this->_password) : $_SESSION['password'];
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

    $data = mysql_query("SELECT * FROM employee WHERE username = '{$this->_username}' AND password = '{$this->_passmd5}'");

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
}

?>
