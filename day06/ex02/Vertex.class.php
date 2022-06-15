<?php

	require_once "Color.class.php";

	class Vertex 
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 1.0;
		private $_color;

		static $verbose = False;

		function __construct($arr)
		{
			if (isset($arr['dest']) && $arr['dest'] instanceof Vertex)
			{
				if (isset($arr['orig']) && $arr['orig'] instanceof Vertex) 
				{
					$orig_coords = array('x' => $arr['orig']->read_x(), 'y' => $arr['orig']->read_y(), 'z' => $arr['orig']->read_z());
					$orig = new Vertex($orig_coords);
				}
				else
					$orig = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0));

				$this->_x = $arr['dest']->read_x() - $orig->read_x();
				$this->_y = $arr['dest']->read_y() - $orig->read_y(); 
				$this->_z = $arr['dest']->read_z() - $orig->read_z();
			}
			if (Vector::$verbose) 
				print($this->__toString() . " constructed\n");
		}

		function __toString()
		{
			if (Vertex::$verbose)
			{
				$arr = array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
				return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $arr));
			}
			else
				return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
		}

		static function doc()
		{
			if (file_exists("./Vertex.doc.txt")) 
				return(file_get_contents("./Vertex.doc.txt"));
			return "";
		}

		function __destruct()
		{
			if (Vertex::$verbose)
				print($this->__toString() . " destructed\n");
		}

		function read_x()
		{
			return $this->_x;
		}

		function read_y()
		{
			return $this->_y;
		}

		function read_z()
		{
			return $this->_z;
		}

		function read_w()
		{
			return $this->_w;
		}

		function read_color()
		{
			return $this->_color;
		}
		
		function write_x($x)
		{
			$this->_x = $x;
 		}

		function write_y($y)
		{
			$this->_y = $y;
		}

		function write_z($z)
		{
			$this->_z = $z;
		}

		function write_w($w)
		{
			$this->_w = $w;
		}

		function write_color($color)
		{
			$this->_color = $color;
		}
	}
?>