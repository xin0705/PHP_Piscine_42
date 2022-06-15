<?php
	class Color
	{
		public $red = 0;
		public $green = 0;
		public $blue = 0;

		static $verbose = false;

		function __construct(array $color)
		{
			if (isset($color['rgb']))
			{
				$this->red = intval($color['rgb']) >> 16 & 255;
				$this->green = intval($color['rgb']) >> 8 & 255;
				$this->blue = intval($color['rgb']) & 255;
			}
			else {
				$this->red = intval($color['red']);
				$this->green = intval($color['green']);
				$this->blue = intval($color['blue']);
			}
			if (Color::$verbose) {
				print($this->__toString() . " constructed.\n");
			}
		}

		function __destruct() 
		{
			if (Color::$verbose)
				print($this->__toString() . " destructed.\n");
		}

		function __toString()
		{
			return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
		}

		static function doc()
		{
			if (file_exists("./Color.doc.txt"))
				return(file_get_contents("./Color.doc.txt"));
			return "";
		}

		function add(Color $rhs)
		{
			$new = new Color (array (
			"red" => $this->red + $rhs->red,
			"green" => $this->green + $rhs->green,
			"blue" => $this->blue + $rhs->blue,
			));
			return $new;
		}

		function sub(Color $rhs)
		{
			$new = new Color (array (
			"red" => $this->red - $rhs->red,
			"green" => $this->green - $rhs->green,
			"blue" => $this->blue - $rhs->blue,
			));
			return $new;
		}

		function mult($rhs)
		{
			$new = new Color(array(
			'red' => $this->red * $rhs,
			'green' => $this->green * $rhs,
			'blue' => $this->blue * $rhs
			));
			return $new;
		}
	}
?>