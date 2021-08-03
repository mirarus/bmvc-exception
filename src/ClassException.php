<?php

/**
 * ClassException
 *
 * Mirarus BMVC
 * @package BMVC\Exception
 * @author  Ali Güçlü (Mirarus) <aliguclutr@gmail.com>
 * @link https://github.com/mirarus/bmvc-exception
 * @license http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version 0.3
 */

namespace BMVC\Exception;

use Exception;

class ClassException extends Exception
{

	private static $namespaces = [
		'BMVC\\Core', 
		'BMVC\\Libs', 
		'BMVC\\Exception'
	];

	public function __construct($message)
	{
		#
		$path = (dirname(dirname(dirname(dirname(__DIR__)))) . DIRECTORY_SEPARATOR);
		$path = @str_replace(['/', '//', '\\'], DIRECTORY_SEPARATOR, $path);
		#
		$class = @str_replace([$path, '.php'], null, self::getFile());
		$class = @str_replace(['/', '//'], '\\', $class);
		#

		if (class_exists($class)) {
		
			$class = str_replace(self::$namespaces, null, $class);
			$message = '(' . $class . ') Error! | ' . $message;
		}

		parent::__construct($message);
	}
}