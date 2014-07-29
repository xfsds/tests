<?php


	class Customer
	{
		public $customerType;
		
		function __construct($param)
		{
			$this->customerType = $param;
		}
				
		function __set($name, $value)
		{
			$this->$name = $value;
		}
		
		function __get($name)
		{
			return $this->$name;
		}
		
		static function GetCustomerTypeInfo(&$info)
		{
			$query = 'select * from customer_type';
			
			return ($info = $_SESSION['db']->query($query));
		}
		
	}
	
	class CustomerHuman extends Customer
	{
		public $name;
		public $age;
		public $identificationType;
		public $identificationNo;
		
		function __set($name, $value)
		{
			if ( ($name == "name") && ((strlen($value) == 0) || (strlen($value) > 10)) )
				return;
			if ( ($name == "name") && ((strlen($value) == 0) || (strlen($value) > 10)) )
			{
				
			}
			if ( ($name == "age") && (($value < 0) || ($value >= 130)) )
				return;
			if ( ($name == "identificationType") && (($value < 0) || ($value >= 130)) )
				return;
			if ( ($name == "identificationNo") && (($value < 0) || ($value >= 130)) )
				return;
			
			$this->$name = $value;		
		}
		
		function __get($name)
		{
			return $this->$name;
		}
		
		function GetCustomerInfo($id, &$info)
		{
			$query = 'select * from customer_human '
					. "where id = '$id'";
			
			$info = $_SESSION['db']->query($query);
		}
		
		function SetCustomerName($id, $value)
		{
			$query = 'update customer_human'
					. "set name = '$value'"
					. "where id = '$id'";
			$result = $_SESSION['db']->query($query);
		}
	}

?>