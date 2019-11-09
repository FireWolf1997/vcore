<?php
	define("TOOKEN", 'qwerty');
	define("queyDir", $_SERVER["DOCUMENT_ROOT"]."/vcore/beast/query_files");

	if($_REQUEST["tooken"] == TOOKEN){
		$list_dir = scandir(queyDir);
		if(count($list_dir)>2){
			$file_array = array();
			$list_dir = array_slice($list_dir, 2);

			foreach ($list_dir as $key=>$element){
				$file_array[$key]["name"] = $element;
				$file_array[$key]["size"] = filesize(queyDir."/".$element);
			}
			echo json_encode($file_array);
		}
	}