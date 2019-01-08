<?php 
class ContactModel
{
  var $tel;

  function ContactModel($tel)
  {
    $this->tel = $tel;
  }
  function getTel()
  {
    return $this->tel;
  }
  function setTel($tel)
  {
    $this->tel = $tel;
  }
}
?>
