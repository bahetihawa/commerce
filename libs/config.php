<?php
	
    define('title', "ITCombine");
    define('Bussines', "ITCombine");	
   
class DB
{
	//const DB_HOST = 'db4free.net';
    //const DB_NAME = 'perception';
    //const DB_USER = 'perception';
    //const DB_PASSWORD = 'perception@123';
	
	const DB_HOST = 'localhost';
    const DB_NAME = 'ecommerce';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
	
   private static $instance = null;
   public static function conn()
   {
       if(self::$instance == null)
       {
		   $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
           try
           {
               self::$instance = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
           } 
           catch(PDOException $e)
           {
               // Handle this properly
               throw $e;
           }
       }
       return self::$instance;
   }
}
?>