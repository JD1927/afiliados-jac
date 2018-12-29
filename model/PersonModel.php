<?php 
class PersonModel
{	
	var $id,$id_type,$fullname,$cod_tper,
	$birth_date,$address,$email,
	$cod_gender,$cod_health,
	$cod_thealth,$cod_committee,
	$cod_knowledge,$id_familiar;

	function PersonModel($id,$id_type,$fullname,$cod_tper,$birth_date,$address,
		$email,$cod_gender,$cod_health,	$cod_thealth,	$cod_committee,$cod_knowledge,$id_familiar)
	{
		$this->id=$id;
		$this->id_type=$id_type;
		$this->fullname=$fullname;
		$this->cod_tper=$cod_tper;
		$this->birth_date=$birth_date;
		$this->address=$address;
		$this->email=$email;
		$this->cod_gender=$cod_gender;
		$this->cod_health=$cod_health;
		$this->cod_thealth=$cod_thealth;
		$this->cod_committee=$cod_committee;
		$this->cod_knowledge=$cod_knowledge;
		$this->id_familiar=$id_familiar;
	}
	//ID
  function getId()
	{
		return $this->id;
	}
	function setId($id)
	{
		$this->id = $id;
	}
	//Tipo ID
	function getIdType()
	{
		return $this->id_type;
	}
	function setIdType($id_type)
	{
		$this->id_type = $id_type;
	}
	//Nombre Completo
	function getFullname()
	{
		return $this->fullname;
	}
	function setFullname($fullname)
	{
		$this->fullname = $fullname;
	}
	//Tipo persona
	function getCodTper()
	{
		return $this->cod_tper;
	}
	function setCodTper($cod_tper)
	{
		$this->cod_tper = $cod_tper;
	}
	//Fecha de Nacimiento
	function getBirthDate()
	{
		return $this->birth_date;
	}
	function setBirthDate($birth_date)
	{
		$this->birth_date = $birth_date;
	}
	//Dirección
	function getAddress()
	{
		return $this->address;
	}
	function setAddress($address)
	{
		$this->address = $address;
	}
	//Correo electrónico
	function getEmail()
	{
		return $this->email;
	}
	function setEmail($email)
	{
		$this->email = $email;
	}
	//Género
	function getCodGender()
	{
		return $this->cod_gender;
	}
	function setCodGender($cod_gender)
	{
		$this->cod_gender = $cod_gender;
	}
	//Entidad de Salud EPS
	function getCodHealth()
	{
		return $this->cod_health;
	}
	function setCodHealth($cod_health)
	{
		$this->cod_health = $cod_health;
	}
	//Tipo de persona en la EPS
	function getCodTHealth()
	{
		return $this->cod_thealth;
	}
	function setCodTHealth($cod_thealth)
	{
		$this->cod_thealth = $cod_thealth;
	}
	//Comité
	function getCodCommittee()
	{
		return $this->cod_committee;
	}
	function setCodCommittee($cod_committee)
	{
		$this->cod_committee = $cod_committee;
	}
	//Nivel Académico
	function getCodKnowledge()
	{
		return $this->cod_knowledge;
	}
	function setCodKnowledge($cod_knowledge)
	{
		$this->cod_knowledge = $cod_knowledge;
	}
	//Familiar
	function getIdFamiliar()
	{
		return $this->id_familiar;
	}
	function setIdFamiliar($id_familiar)
	{
		$this->id_familiar = $id_familiar;
	}
}
?>
