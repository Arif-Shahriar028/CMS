<?php

/**
 * @class DBConnection - a singletone class
 */
final class DBConnection
{
  private static $instance = null;
  private $connection;

  /**
   * @__construct is private, object of class DBConnection can't be made
   * from outside of the class
   */
  private function __construct()
  {
  }

  /**
   * @__clone is private, object of class DBConnection can't be made
   * from outside of the class
   */
  private function __clone()
  {
  }

  /**
   * @__wakeup() is private, object of class DBConnection can't be made
   * from outside of the class
   */
  private function __wakeup()
  {
  }

  /**
   * @method private static getInstance() 
   * returns the singletone object
   */
  public static function getInstance()
  {
    if (is_null(self::$instance)) {
      self::$instance = new DBConnection();  // access static member using 'self'. As we are not acess this variable with any object
    }
    return self::$instance;
  }

  /**
   * @method public static connect() initialize the 
   * connection with mysql database
   */
  public function connect($host, $db, $user, $password)
  {
    // if we access variable using object, then we use 'this'
    $this->connection = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);
  }

  /**
   * @method public static getConnection() 
   * returns the connection variable;
   */
  public function getConnection()
  {
    return $this->connection;
  }
}
