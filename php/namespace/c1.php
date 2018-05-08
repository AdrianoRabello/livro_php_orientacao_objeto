<?php 

	namespace Library\Widgets;
	//require_once "b1.php";
	use Library\Container\Table;
	use SplFileInfo;
	class Form{


		
		function fazAlgo(Field $x){

			echo " estou fazendo algo na classe c1";
		}

		public function show(){
			$t = new Table;
			new SplFileInfo('/tmp/shadow');
			//echo "teste";
		}
	}

	

 ?>