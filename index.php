<?php

require("db.php");
require("dbuser.php");

// echo phpinfo() . "<br>\n";

$tables = dbuser::getinstance()->users();

echo "Retrieve the tables of DD<br>\n";

while ( ads_fetch_row( $tables ) )
{ 
	echo "[" . ads_result( $tables, "cNbrUse" ) . "] <br>\n"; 
} 


// $myclass2 = new db;
// $myclass2->connect(); 
// $myclass2->disconnect(); 	// Public y Protected funcionan, pero Private no

?>