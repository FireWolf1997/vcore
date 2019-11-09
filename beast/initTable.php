<?php
if(file_exists($_SERVER["DOCUMENT_ROOT"]."/vcore/class/DBInit.php"))
require_once ($_SERVER["DOCUMENT_ROOT"]."/vcore/class/DBInit.php");
define("queyDir", $_SERVER["DOCUMENT_ROOT"]."/vcore/beast/query_files/");

if($_REQUEST["tooken"] == "qwerty" && !empty($_REQUEST["filename"])){
	$DB = new mysqli("localhost", "root", "", "talkerdb");
	$request = file_get_contents(queyDir.$_REQUEST["filename"]);

	$result = $DB->query($request);
	$DB->close();
	if($result){
		echo 1;
	}
	else{
		echo $request;
	}
}
else{
	die();
}
