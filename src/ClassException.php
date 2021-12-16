<?php

/**
 * ClassException
 *
 * Mirarus BMVC
 * @package BMVC\Exception
 * @author  Ali Güçlü (Mirarus) <aliguclutr@gmail.com>
 * @link https://github.com/mirarus/bmvc-exception
 * @license http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version 0.4
 */

namespace BMVC\Exception;

use Exception;

class ClassException extends Exception
{

	/**
	 * @var array
	 *
	 * @phpstan-ignore-next-line
	 */
	private $namespaces = [
		'BMVC\\Core', 
		'BMVC\\Libs', 
		'BMVC\\Exception'
	];

	/**
	 * @param string      $message
	 * @param string|null $class
	 */
	public function __construct(string $message, string $class = null)
	{
		if ($class && @class_exists($class)) {
			$class = str_replace($this->namespaces, '', $class);
			$message = '"' . $class . '" Class Error! | ' . $message;
		}

		parent::__construct($message);
	}
}