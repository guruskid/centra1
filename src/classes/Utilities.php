<?php
namespace KanbanBoard;
require '../../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

class Utilities
{
	private function __construct() {
	}

	public static function env($name, $default = NULL) {
		$value = getenv();
		if($default !== NULL) {
			if(!empty($value))
				return $value;
			return $default;
		}
		return (empty($value) && $default === NULL) ? die('Environment variable ' . $name . ' not found or has no value') : $value;
	}

	public static function hasValue($array, $key) {
		return is_array($array) && array_key_exists($key, $array) && !empty($array[$key]);
	}

	public static function dump($data) {
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}
}