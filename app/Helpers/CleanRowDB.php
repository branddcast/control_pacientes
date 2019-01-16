<?php

namespace App\Helpers;

class CleanRowDB{

	public function limpiar($cadena = null){

		$array = explode('|', $cadena); 
		$aux  = array();
		$j = 0;

		for ($i=0; $i < count($array) - 1 ; $i++) { 
			if($array[$j] == ""){
				$aux[$i] = null;
				$j++;
			}else{
				$aux[$i] = $array[$j];
				$j++;
			}
		}

		return $aux;

	}
}