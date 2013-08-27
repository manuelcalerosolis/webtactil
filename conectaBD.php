<?php
function conectaBD() {

	//$cadena = "DataDirectory=C:/Gestool/GstApolo.Add;ServerTypes=2";
	$cadena = "DataDirectory=C:/Fw195/Gestool/bin/GstApolo.Add;ServerTypes=2";
	$rConn = ads_connect($cadena, "ADSSYS", "");
	return $rConn;
}

function ejecutaQuery($rConn, $query) {
	$rStmt = NULL;
	if ($rConn == False) {
		$strErrCode = ads_error();
		$strErrString = ads_errormsg();

		//echo "Connection failed: " . $strErrCode . " " . $strErrString . "<br />";
	} else {
		//echo "Connection successful!<br>\n";
		$prefijoBD= leeDatoConfiguracion("prefijobd");
		$query= str_replace("prefijo", $prefijoBD, $query);
		
		$rStmt = ads_prepare($rConn, $query);
		$rResult = ads_execute($rStmt);
		//echo "Connection closed<br>\n";
	}

	return $rStmt;
}

function ejecutaComando($query) {
	$c= False;
	$rConn = conectaBD();
	if ($rConn) {
		$c= ejecutaQuery($rConn, $query);
		desconectaBD($rConn);
	}
	
	return $c;
}

function desconectaBD($rConn) {
	if ($rConn)
		ads_close($rConn);
}
?>