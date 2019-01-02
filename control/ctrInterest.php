<?php
class ctrInterest
{
  var $oInterest;
  var $recordSet;
  function ctrInterest($oInterest)
  {
    //Obtiene el objeto de ÁreaModel
    $this->oInterest = $oInterest;
  }
  function create()
  {
    //Obtiene los valores ingresados en la vista
    $description = $this->oInterest->getDescription();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
		//--------------Se ejecuta Comando SQL-------------------------
    $insert = "INSERT into OCUPACION (DESCRIPCION) values ('" . $description . "')";
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
  function interest_list()
  {
    
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
            //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT * FROM OCUPACION";
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
  function update()
  {
    //Obtiene los valores ingresados en la vista
    $code = $this->oInterest->getCode();
    $description = $this->oInterest->getDescription();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
		//--------------Se ejecuta Comando SQL-------------------------
    $update = "UPDATE OCUPACION SET DESCRIPCION ='" . $description . "' WHERE CODIGO=" . $code . "";
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
    $code = $this->oInterest->getCode();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
            
		//--------------Se ejecuta Comando SQL-------------------------
    $delete = "DELETE FROM OCUPACION where CODIGO =" . $code . "";
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