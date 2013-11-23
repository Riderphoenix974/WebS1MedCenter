<?php

class User{
  
    private $Name;
	private $Gender;

	
	function __construct($name,$gender)
    {
        $this->Name = $name;
        $this->Gender = $gender;
    }
    public function UserName()
	{
    return $this->Name;
	}

	public function Gender()
	{
    return $this->Gender;
	}
}

$morgan= new User("Morgan","Male");

echo "Profile of ".$morgan->UserName();

?>