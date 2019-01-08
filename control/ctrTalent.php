<?php
class ctrTalent
{
  var $oTalent;
  var $oPerson;
  var $recordSet;
  function ctrTalent($oTalent, $oPerson)
  {
    //Obtiene el objeto de ÁreaModel
    $this->oTalent = $oTalent;
    $this->oPerson = $oPerson;
  }
  function create()
  {
    //Obtiene los valores ingresados en la vista
    $description = $this->oTalent->getDescription();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
		//--------------Se ejecuta Comando SQL-------------------------
    $insert = "INSERT into HOBBY (DESCRIPCION) values ('" . $description . "')";
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

  function addHobby()
  {
    $id = $this->oPerson->getId();
    $cod_hobby = $this->oTalent->getCode();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
		//--------------Se ejecuta Comando SQL-------------------------
    $insert = "INSERT INTO per_hobby (IDPERSONA, HOBBY) VALUES (" . $id . ", " . $cod_hobby . ")";
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

  function rmHobby()
  {
    $id = $this->oPerson->getId();
    $cod_hobby = $this->oTalent->getCode();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
		//--------------Se ejecuta Comando SQL-------------------------
    $delete = "DELETE FROM `per_hobby` WHERE `per_hobby`.`IDPERSONA` = ".$id." AND `per_hobby`.`HOBBY` = ".$cod_hobby."";
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

  function talent_list()
  {
    
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
            //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT * FROM HOBBY";
            //  echo " Comando SQL : ". $select;
    //Obtiene los registros de la consulta
    $recordSet = $oConnection->executeSQL($bd, $select);
    //Inicializa el contador
    $i = 0;
    //Inicializa las dimensiones del array bidimiensional
    $mat[0][0] = 2;
    //Recorre el array y incrementa el valor de contador
    while ($search = mysql_fetch_array($recordSet)) {
      $mat[$i][1] = $search['CODIGO'];
      $mat[$i][2] = $search['DESCRIPCION'];
      $i = $i + 1;
    }
    //Cierra la conexión con la BD
    $oConnection->close($link);
    //Devuelve el array bidimensional con los registros encontrados en la BD
    return $mat;
  }

  function pertal_list()
  {
    $id = $this->oPerson->getId();
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
            //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT h.CODIGO,h.DESCRIPCION
              FROM hobby h 
              INNER JOIN per_hobby ph 
              ON h.CODIGO = ph.HOBBY
              INNER JOIN persona p 
              ON ph.IDPERSONA = p.IDENTIFICACION
              WHERE p.IDENTIFICACION = " . $id . "";
    //Obtiene los registros de la consulta
    $recordSet = $oConnection->executeSQL($bd, $select);
    //Inicializa el contador
    $i = 0;
    //Inicializa las dimensiones del array bidimiensional
    $mat[0][0] = 2;
    //Recorre el array y incrementa el valor de contador
    while ($search = mysql_fetch_array($recordSet)) {
      $mat[$i][1] = $search['CODIGO'];
      $mat[$i][2] = $search['DESCRIPCION'];
      $i = $i + 1;
    }
    //Cierra la conexión con la BD
    $oConnection->close($link);
    //Devuelve el array bidimensional con los registros encontrados en la BD
    return $mat;
  }

  function update()
  {
    //Obtiene los valores ingresados en la vista
    $code = $this->oTalent->getCode();
    $description = $this->oTalent->getDescription();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
		//--------------Se ejecuta Comando SQL-------------------------
    $update = "UPDATE HOBBY SET DESCRIPCION ='" . $description . "' WHERE CODIGO=" . $code . "";
    $recordSet = $oConnection->executeSQL($bd, $update);
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
  function delete()
  {
    $code = $this->oTalent->getCode();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
            
		//--------------Se ejecuta Comando SQL-------------------------
    $delete = "DELETE FROM HOBBY where CODIGO =" . $code . "";
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
}
?>