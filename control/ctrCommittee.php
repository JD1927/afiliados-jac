<?
class ctrCommittee
{
  var $oCommittee;
  var $recordSet;
  function ctrCommittee($oCommittee)
  {
    //Obtiene el objeto de ÁreaModel
    $this->oCommittee = $oCommittee;
  }
  function create()
  {
    //Obtiene los valores ingresados en la vista
    $description = $this->oCommittee->getDescription();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
		//--------------Se ejecuta Comando SQL-------------------------
    $insert = "INSERT into COMITE (DESCRIPCION) values ('" . $description . "')";
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
  function committee_list()
  {
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
            //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT * FROM COMITE";
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
    $code = $this->oCommittee->getCode();
    $description = $this->oCommittee->getDescription();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
		//--------------Se ejecuta Comando SQL-------------------------
    $update = "UPDATE COMITE SET DESCRIPCION ='" . $description . "' WHERE CODIGO=" . $code . "";
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
    $code = $this->oCommittee->getCode();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
            
		//--------------Se ejecuta Comando SQL-------------------------
    $delete = "DELETE FROM COMITE where CODIGO =" . $code . "";
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