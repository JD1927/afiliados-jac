<?php
class ctrContact
{
  var $oContact;
  var $oPerson;
  var $recordSet;
  function ctrContact($oContact, $oPerson)
  {
    $this->oContact = $oContact;
    $this->oPerson = $oPerson;
  }

  function addContact()
  {
    $id = $this->oPerson->getId();
    $tel = $this->oContact->getTel();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
		//--------------Se ejecuta Comando SQL-------------------------
    $insert = "INSERT INTO `tel_persona` (`IDPERSONA`, `TELEFONO`) VALUES (".$id.", '".$tel."')";
    $recordSet = $oConnection->executeSQL($bd, $insert);
    $oConnection->close($link);
		//--------------VERIFICAMOS SI SE REALIZO LA select--------------------------------------------------
    if (!$recordSet) {
      die(" ERROR CON EL COMANDO SQL: " . mysql_error());
    } else {
			//----------AL RESULTADO QUE SE VA A RETORNAR = RESULTADO DE LA select---------------
      $this->recordSet = $recordSet;
      return true;
    }
  }

  function rmContact()
  {
    $id = $this->oPerson->getId();
    $tel = $this->oContact->getTel();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
		//--------------Se ejecuta Comando SQL-------------------------
    $delete = "DELETE FROM `tel_persona` WHERE `tel_persona`.`IDPERSONA` = ".$id." AND `tel_persona`.`TELEFONO` = '".$tel."'";
    $recordSet = $oConnection->executeSQL($bd, $delete);
    $oConnection->close($link);
		//--------------VERIFICAMOS SI SE REALIZO LA select--------------------------------------------------
    if (!$recordSet) {
      die(" ERROR CON EL COMANDO SQL: " . mysql_error());
    } else {
			//----------AL RESULTADO QUE SE VA A RETORNAR = RESULTADO DE LA select---------------
      $this->recordSet = $recordSet;
      return true;
    }
  }

  function contact_list()
  {
    $id = $this->oPerson->getId();
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
            //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT `IDPERSONA`,`TELEFONO` FROM `tel_persona` WHERE `IDPERSONA` = ".$id."";
            //  echo " Comando SQL : ". $select;
    //Obtiene los registros de la consulta
    $recordSet = $oConnection->executeSQL($bd, $select);
    //Inicializa el contador
    $i = 0;
    //Inicializa las dimensiones del array bidimiensional
    $mat[0][0] = 2;
    //Recorre el array y incrementa el valor de contador
    while ($search = mysql_fetch_array($recordSet)) {
      $mat[$i][1] = $search['IDPERSONA'];
      $mat[$i][2] = $search['TELEFONO'];
      $i = $i + 1;
    }
    //Cierra la conexión con la BD
    $oConnection->close($link);
    //Devuelve el array bidimensional con los registros encontrados en la BD
    return $mat;
  }

}
?>