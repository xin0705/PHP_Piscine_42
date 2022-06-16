<?php

class UnholyFactory
{
	private $_material = [];
	public function absorb($person)
	{
		if ($person instanceof Fighter) 
		{
			if (!(in_array($person, $this->_material)))
			{
				$this->_material[] = $person;
				print("(Factory absorbed a fighter of type " . $person . ")" . PHP_EOL);
			} 
			else
				print("(Factory already absorbed a fighter of type " . $person . ")" . PHP_EOL);
		} 
		else 
			print("(Factory can't absorb this, it's not a fighter)\n");
	}

	public function fabricate($soldier)
	{
		foreach ($this->_material as $product)
		{
			if ($soldier == $product)
			{
				print("(Factory fabricates a fighter of type " . $soldier . ")" . PHP_EOL);
				return $product;
			}
		}
		print("(Factory hasn't absorbed any fighter of type " . $soldier . ")" . PHP_EOL);
		return NULL;
	}
}

?>