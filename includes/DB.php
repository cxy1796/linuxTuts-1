<?

// Interface to access backend database
// Creates connection if none exists, otherwise recycles connection and returns the reference
// Simply call $var = DB::access() anywhere in the program

Class DB
{
	private static $link = null;
	
	public static function access()
	{
		if(self::$link == null){
			self::connect();
		}
		return self::$link;
	}
	
	private static function connect()
	{
		try
		{
			$dsn = ('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);
			self::$link = new PDO($dsn, DB_USER, DB_PASS);
			//self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) 
		{
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}

?>