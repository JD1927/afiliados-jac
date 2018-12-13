<?
class ctrHealth
{
  var $oHealth;
  var $recordSet;
  function ctrHealth($oHealth)
  {
    //Obtiene el objeto de ÁreaModel
    $this->oHealth = $oHealth;
  }
  function create()
  {
    //Obtiene los valores ingresados en la vista
    $company = $this->oHealth->getCompany();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
		//--------------Se ejecuta Comando SQL-------------------------
    $select = "INSERT into SALUD (ENTIDAD) values ('" . $company . "')";
    $recordSet = $oConnection->executeSQL($bd, $select);
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
  function health_list()
  {
    
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
    
    
            //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT * FROM SALUD";
            //  echo " Comando SQL : ". $select;
    //Obtiene los registros de la consulta
    $recordSet = $oConnection->executeSQL($bd, $select);
    //Inicializa el contador
    $i = 0;
    //Inicializa las dimensiones del array bidimiensional de áreas
    $mat[0][0] = 2;
    //Recorre el array y incrementa el valor de contador
    while ($search = mysql_fetch_array($recordSet)) {
      $mat[$i][1] = $search['CODIGO'];
      $mat[$i][2] = $search['ENTIDAD'];
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
    $code = $this->oHealth->getCode();
    $company = $this->oHealth->getCompany();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
		//--------------Se ejecuta Comando SQL-------------------------
    $update = "UPDATE SALUD SET ENTIDAD='" . $company . "' WHERE CODIGO=" . $code . "";
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
    $code = $this->oHealth->getCode();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
            
		//--------------Se ejecuta Comando SQL-------------------------
    $delete = "DELETE FROM SALUD where CODIGO =" . $code . "";
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