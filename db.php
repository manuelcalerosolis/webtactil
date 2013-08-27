<?php

class db
{

	/**
	 * @var string dsn (eg. DataDirectory=\\\\server1\\share1\\data\\;ServerTypes=2 )
	 */
	protected $dsn;

	/**
	 * @var string Database user (eg. root)
	 */
	protected $user;

	/**
	 * @var string Database password (eg. can be empty !)
	 */
	protected $password;

	/**
	 * @var string Server (eg. localhost)
	 */
	protected $server;

	/**
	 * @var string Database name
	 */
	protected $database;

	/**
	 * @var mixed Ressource link
	 */
	protected $link;

	protected static $instance;

	protected $errCode; 

	protected $errString; 

	public function connect()
	{
		$this->dsn 			= "DataDirectory=C:/Fw195/Gestool/bin/GstApolo.Add;ServerTypes=2";
		$this->user 		= "ADSSYS";
		$this->password	= "";
		$this->link 		= ads_connect($this->dsn, $this->user, $this->password);
	
		if ( $this->link == False )
		{ 
			$this->errCode 	= ads_error(); 
			$this->errString 	= ads_errormsg(); 
		} 

		return $this->link;
	}

	public function disconnect()
	{
		if ($this->link)
			ads_close($this->link);
	}

	public function executeQuery($query)
	{
		$rStmt = NULL;

		if ($this->connect())
		{
			$rStmt 	= ads_prepare($this->link,$query);
			$rResult = ads_execute($rStmt);
		}		

		return $rStmt;
	}

	/**
	 * Get child layer class
	 *
	 * @return string
	 */

	public static function getinstance()
	{
		if (!isset(self::$instance))
		{
			self::$instance 	= new db();
		}

		return self::$instance;
	}

	public function systemTables()
	{
		return $this->executeQuery( "SELECT name FROM system.tables" );
	}


}

?>