<?php 
class UserModel
{
	var $password;
  var $name;
  var $codigo;

	function UserModel($codigo,$name, $password)
	{
    $this->codigo = $codigo;
		$this->password = $password;
		$this->name = $name;
  }
  function getCodigo()
	{
		return $this->codigo;
	}
	function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}
	
	function getName()
	{
		return $this->name;
	}
	function setName($name)
	{
		$this->name = $name;
  }
  
  function getPassword()
	{
		return $this->password;
	}
	function setPassword($password)
	{
		$this->password = $password;
	}
}
?>
