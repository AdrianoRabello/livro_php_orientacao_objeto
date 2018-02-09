<?php
	spl_autoload_register(function($className){
		$fileName = "..".DIRECTORY_SEPARATOR."ar".DIRECTORY_SEPARATOR.$className.".php";
		if (file_exists($fileName)) {
			require_once($fileName);
		}
	});
 ?>
