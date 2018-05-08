<?php 

	namespace Livro\Core;

	class ClassLoader{

		protected $prefixes = array();

		public function register(){

			spl_autoload_register(array($this,'loadclass'));

		}

		public function addNamespace($prefix, $base_dir, $prepend = false){

		}

		public function loadClass($class){

		}
	}

 ?>