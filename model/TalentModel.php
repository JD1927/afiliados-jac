<?php 
class TalentModel
{
  var $description;
  var $code;

	function TalentModel($code,$description)
	{
    $this->code = $code;
		$this->description = $description;
  }
  function getCode()
	{
		return $this->code;
	}
	function setCode($code)
	{
		$this->code = $code;
	}
	
	function getDescription()
	{
		return $this->description;
	}
	function setDescription($description)
	{
		$this->description = $description;
  }
}
?>
