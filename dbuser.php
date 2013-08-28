<?php

if(  !class_exists('db') ) {
    include('db.php');
}

class dbUser extends db
{

	/**
	 * Get child layer class
	 *
	 * @return string
	 */

	public static function getinstance()
	{
		if (!isset(self::$instance))
		{
			self::$instance 	= new dbUser();
		}

		return self::$instance;
	}
	
	public function users()
	{
		return $this->executeQuery( "SELECT * FROM DatosUsers" );
	}

	public static function userExists($nombre)
	{
	 	if (Validate::isName($nombre))
	 		return $this->executeQuery( "SELECT cCodUse FROM DatosUsers LIMIT 1 WHERE nombre = ".pSQL($nombre) ); 
	}

}

?>