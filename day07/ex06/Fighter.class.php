<?php

class Fighter 
{
	private $_name;

	public function __construct ($type)
	{
		if ($type)
			$this->_name = $type;
	}

	public function __toString ()
	{
		if ($this->_name)
			return $this->_name;
	}
}

?>