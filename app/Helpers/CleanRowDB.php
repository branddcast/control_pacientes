<?php

namespace App\Helpers;

class CleanRowDB{

	public function clean($cadena){

		$array = explode('|',$cadena); 

		return $array;

	}
}