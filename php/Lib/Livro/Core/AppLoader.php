<?php 

	namespace Livro\Core;
	use RecursiveInterator;
	use RecursiveDirectoryInterator;
	use Exception;

	class AppLoader{
		protected $directories;

		public function addDirectory($directory){
			$this->directories[] = $directory;

		}

		public function register(){
			spl_autoload_register(array($this,'loadClass'));

		}

		public function loadClass($class){
			
		}

	}


 ?>