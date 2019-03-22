<?php class Database{
	private static $dbName='testphp';
 	private static $dbHost='Localhost';
    private static $dbUsername='root';
    private static $dbUserPassword=''; 
    private static $cont=null ; 
    public function __construct()
    {
    	die('Init function is not allowed');
    }
     public static function connect()
     //autoriser une seule connexion pour toute la durée de l'accès
     {
     	if (null==self::$cont)
     		{
     		 try
     		  {
     		   self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
     		}
     		 catch(PDOException $e) 
     		 {
     		  die($e->getMessage());
}
}
			return self::$cont;
}
public static function disconnect(){
			self::$cont=null;
}

}


?>