<?php

	spl_autoload_register(function($className){
		$fileName = $className.".php";
		if (file_exists($fileName)) {

			//include $fileName;
			require_once($fileName);
		}
	});
 ?>
