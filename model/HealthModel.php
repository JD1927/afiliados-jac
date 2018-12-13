<?php 
class HealthModel
{
  var $company;
  var $code;

	function HealthModel($code,$company)
	{
    $this->code = $code;
		$this->company = $company;
  }
  function getCode()
	{
		return $this->code;
	}
	function setCode($code)
	{
		$this->code = $code;
	}
	
	function getCompany()
	{
		return $this->company;
	}
	function setCompany($company)
	{
		$this->company = $company;
  }
}
?>
