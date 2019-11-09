<?php
class CLoader{
	public static function loadJS($jsName){
		if(file_exists($_SERVER["DOCUMENT_ROOT"].SCRIPT_FOLDER.$jsName))
			echo "<script type='text/javascript' src='".SCRIPT_FOLDER.$jsName."'></script>";
	}

	public static function loadExternalJS($jsName){
		if(file_exists($_SERVER["DOCUMENT_ROOT"].$jsName))
			echo "<script type='text/javascript' src='".$jsName."'></script>";
	}
}