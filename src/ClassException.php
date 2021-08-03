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

	private $namespaces = [
		'BMVC\\Core', 
		'BMVC\\Libs', 
		'BMVC\\Exception'
	];

	public function __construct($message, $class=null)
	{
		if ($class && @class_exists($class)) {
			$class = str_replace($this->namespaces, null, $class);
			$message = '"' . $class . '" Class Error! | ' . $message;
		}

		parent::__construct($message);
	}
}