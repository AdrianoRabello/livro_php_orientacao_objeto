<?php 
	
	//spl_autoload_register(array( new LibraryLoader, 'loadClass'));

	/**
	* 
	*/
	class LibraryLoader{
		
		function __construct(){
			
		}

		public static function loadClass($class){
			if (file_exists("Lib/{$class}.php")) {
				require_once "Lib/{$class}.php";
				return true;
			}
		}
	}

 ?>