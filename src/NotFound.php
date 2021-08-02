<?php

/**
 * NotFound
 *
 * Mirarus BMVC
 * @package BMVC\Exception
 * @author  Ali Güçlü (Mirarus) <aliguclutr@gmail.com>
 * @link https://github.com/mirarus/bmvc-exceptions
 * @license http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version 0.0
 */

namespace BMVC\Exception;

use Exception;

class NotFound extends Exception
{

	protected $message = 'Page not found!';
	protected $code = 404;

	public function __construct($message=null)
	{
		$message = (($message != null) ? $message : $this->message);

		parent::__construct($message);
	}
}