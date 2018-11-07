<?php

class Validator{

	function secInput($input, $arg){
		switch ($arg['filtr']) {
			case '0':
				{
					if(!self::lenMinCheck($input, $arg) || !self::lenMaxCheck($input, $arg)){
						return self::tabMaker(false, '');
					}
					$input = self::addHTS($input);
					return self::tabMaker(true, $input);
				}break;
			case 'email':
				{
					if(!self::lenMinCheck($input, $arg) || !self::lenMaxCheck($input, $arg)){
						return self::tabMaker(false, '');
					}
					$input = filter_var($input, FILTER_SANITIZE_EMAIL);
					$input = self::addHTS($input);
					if(filter_var($input, FILTER_VALIDATE_EMAIL) === false){
						return self::tabMaker(false, '');
					}
					return self::tabMaker(true, $input);
				}break;
			case 'digit':
				{
					if(!self::lenMinCheck($input, $arg) || !self::lenMaxCheck($input, $arg)){
						return self::tabMaker(false, '');
					}
					$input = self::addHTS($input);
					if(!ctype_digit($input)){
						return self::tabMaker(false, '');
					}
					if(!self::lenMinCheckNumber($input, $arg) || !self::lenMaxCheckNumber($input, $arg)){
						return self::tabMaker(false, '');
					}
					return self::tabMaker(true, $input);
				}break;
			case 'alpha':
				{
					if(!self::lenMinCheck($input, $arg) || !self::lenMaxCheck($input, $arg)){
						return self::tabMaker(false, '');
					}
					$input = self::addHTS($input);
					if(!ctype_alpha($input)){
						return self::tabMaker(false, '');
					}
					return self::tabMaker(true, $input);
				}break;
			case 'alphaSL':
				{
					if(strlen($input) != $arg['len']){
						return self::tabMaker(false, '');
					}
					$input = self::addHTS($input);
					if(!ctype_alpha($input)){
						return self::tabMaker(false, '');
					}
					return self::tabMaker(true, $input);
				}break;
			case 'alphaWithSpace':
				{
					if(!self::lenMinCheck($input, $arg) || !self::lenMaxCheck($input, $arg)){
						return self::tabMaker(false, '');
					}
					$inputTmp = str_replace(' ', '', $input);
					$inputTmp = self::addHTS($inputTmp);
					if(!ctype_alpha($inputTmp)){
						return self::tabMaker(false, '');
					}
					$input = self::addHTS($input);
					return self::tabMaker(true, $input);
				}break;
			case 'alnum':
				{
					if(!self::lenMinCheck($input, $arg) || !self::lenMaxCheck($input, $arg)){
						return self::tabMaker(false, '');
					}
					$input = self::addHTS($input);
					if(!ctype_alnum($input)){
						return self::tabMaker(false, '');
					}
					return self::tabMaker(true, $input);
				}break;
			case 'phoneNumber':
				{
					if(strpos($input, '+')!==false && strpos($input, '+')==0){
						$tmpInput = substr($input, 1);
					} else {
						$tmpInput = $input;
					}
					if(!self::lenMinCheck($tmpInput, $arg) || !self::lenMaxCheck($tmpInput, $arg)){
						return self::tabMaker(false, '');
					}
					if(!ctype_digit($tmpInput)){
						return self::tabMaker(false, '');
					}
					$input = self::addHTS($input);
					return self::tabMaker(true, $input);
				}break;
			case 'checkbox':
				{
					if($input == 'on'){
						return self::tabMaker(true, 'on');
					} else {
						return self::tabMaker(true, '0');
					}
				}break;
			case 'checkboxMustClick':
				{
					if($input == 'on'){
						return self::tabMaker(true, '1');
					} else {
						return self::tabMaker(false, '0');
					}
				}break;
			case 'notEmpty':
				{
					$arg['min'] = 0;
					if(!self::lenMinCheck($input, $arg) || !self::lenMaxCheck($input, $arg)){
						return self::tabMaker(false, '');
					}
					return self::tabMaker(true, $input);
				}break;
			case 'login':{
				;
			}break;
			default:{
				return self::tabMaker(true, $input);
			}break;
		}
	}

	public function addHTS($input){
		return htmlentities(addslashes($input), ENT_QUOTES, "UTF-8");
	}

	public function tabMaker($ok, $var){
		$tab['ok'] = $ok;
		$tab['var'] = $var;
		return $tab;
	}

	public function lenMinCheck($input, $arg){
		if(isset($arg['min'])){
			(string)$len = strlen($input);
			if($len <= $arg['min']){
				return false;
			}
		}
		return true;
	}

	public function lenMaxCheck($input, $arg){
		if(isset($arg['max'])){
			(string)$len = strlen($input);
			if($len >= $arg['max']){
				return false;
			}
		}
		return true;
	}

	public function lenMinCheckNumber($input, $arg){
		if(isset($arg['minNum'])){
			if($input < $arg['minNum']){
				return false;
			}
		}
		return true;
	}

	public function lenMaxCheckNumber($input, $arg){
		if(isset($arg['maxNum'])){
			if($input > $arg['maxNum']){
				return false;
			}
		}
		return true;
	}

}
