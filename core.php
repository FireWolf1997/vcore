<?php
	define("SCRIPT_FOLDER", "/vcore/js/");
    session_start();
    if(file_exists($_SERVER["DOCUMENT_ROOT"]."/vcore/meta/dbconnection.php"))
        require_once ($_SERVER["DOCUMENT_ROOT"]."/vcore/meta/dbconnection.php");

    if(file_exists($_SERVER["DOCUMENT_ROOT"]."/vcore/class/CUser.php"))
        require_once ($_SERVER["DOCUMENT_ROOT"]."/vcore/class/CUser.php");

	if(file_exists($_SERVER["DOCUMENT_ROOT"]."/vcore/class/CMessage.php"))
		require_once ($_SERVER["DOCUMENT_ROOT"]."/vcore/class/CMessage.php");

	if(file_exists($_SERVER["DOCUMENT_ROOT"]."/vcore/class/CLoader.php"))
		require_once ($_SERVER["DOCUMENT_ROOT"]."/vcore/class/CLoader.php");

	$DB = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $User = new CUser($DB);
    $Message = new CMessage($User, $DB);
