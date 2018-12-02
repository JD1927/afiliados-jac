<?php
class ctrUser
{
  var $objUserModel = null;
  var $recordSet = null;

  function CtrUser($objUserModel)
  {
    $this->objUserModel = $objUserModel;
  }
  function create()
  {
    $password = $this->objUserModel->getPassword();
    $username = $this->objUserModel->getName();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $objConnection = new CtrConnection();
    $enlace = $objConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
		//--------------Se ejecuta Comando SQL-------------------------
    $select = "INSERT INTO USUARIO VALUES ('" . $username . "'," . $password . ")";
    $recordSet = $objConnection->executeSQL($bd, $select);
    $objConnection->close($enlace);
		//--------------VERIFICAMOS SI SE REALIZO LA select--------------------------------------------------
    if (!$recordSet) {
      die(" ERROR CON EL COMANDO SQL: " . mysql_error());
    } else {
			//----------AL RESULTADO QUE SE VA A RETORNAR = RESULTADO DE LA select---------------
      $this->recordSet = $recordSet;
      return true;
    }
  }
  function user_list()
  {
    
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $objConnection = new CtrConnection();
    $enlace = $objConnection->connect('localhost', $bd, 'root', '');
    
    
            //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT * FROM USUARIO";
            //  echo " Comando SQL : ". $select;
    $recordSet = $objConnection->executeSQL($bd, $select);
    $i = 0;
    //$registro = 
    $mat[0][0] = 2;
    while ($search = mysql_fetch_array($recordSet)) {
      $mat[$i][1] = $search['USERNAME'];
      $mat[$i][2] = $search['PASSWORD'];
      $i = $i + 1;
    }
    $objConnection->close($enlace);
    return $mat;
  }
  function update()
  {
    $codigo = $this->objUserModel->getCodigo();
    $password = $this->objUserModel->getPassword();
    $username = $this->objUserModel->getName();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $objConnection = new CtrConnection();
    $enlace = $objConnection->connect('localhost', $bd, 'root', '');
    //--------------Se ejecuta Comando SQL-------------------------
    $select = "UPDATE USUARIO SET NOMBRE = '" . $username . "', 
    IDROL = ".$rol." 
    WHERE IDUSUARIO = " . $password . "";
    $recordSet = $objConnection->executeSQL($bd, $select);
    $objConnection->close($enlace);
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
    $codigo = $this->objUserModel->getCodigo();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $objConnection = new CtrConnection();
    $enlace = $objConnection->connect('localhost', $bd, 'root', '');
		//--------------Se ejecuta Comando SQL-------------------------
    $select = "DELETE FROM USUARIO where CODIGO =" . $codigo . "";
    $recordSet = $objConnection->executeSQL($bd, $select);
    $objConnection->close($enlace);
		//--------------VERIFICAMOS SI SE REALIZO LA select--------------------------------------------------
    if (!$recordSet) {
      die(" ERROR CON EL COMANDO SQL: " . mysql_error());
    } else {
			//----------AL RESULTADO QUE SE VA A RETORNAR = RESULTADO DE LA select---------------
      $this->recordSet = $recordSet;
      return true;
    }
  }
  function read()
  {
    $codigo = $this->objUserModel->getCodigo();
    $bd = "AFILIADOS_JAC";
    $objConnection = new CtrConnection();
    $enlace = $objConnection->connect('localhost', $bd, 'root', '');
    $select = "SELECT * FROM USUARIO u WHERE u.CODIGO = ".$codigo."";
    $recordSet = $objConnection->executeSQL($bd, $select);
        // LA FUNCI�N  mysql_fetch_array   PERMITE RECORRER EL RECORDSET (CURSOR A LA TABLA)
        // AQU� SE ASIGNA EL CONTENIDO DEL PRIMER REGISTRO DEL RECORDSET A UNA VARIABLE IDENTIFICADA COMO:
    $search = mysql_fetch_array($recordSet);
    $this->objUserModel->setPassword($search['IDUSUARIO']);
    $this->objUserModel->setName($search['NOMBRE']);
    $this->objUserModel->setRol($search['ROL']);
    $objConnection->close($enlace);
		//--------------VERIFICAMOS SI SE REALIZO LA select--------------------------------------------------
    if (!$recordSet) {
      die(" ERROR CON EL COMANDO SQL: " . mysql_error()) . "<br>";
    } else {
			//----------AL RESULTADO QUE SE VA A RETORNAR = RESULTADO DE LA select---------------
      return $this->objUserModel;
    }
  }
  function validate_user()
  {
    $username = $this->objUserModel->getName();

    $bd = "AFILIADOS_JAC";
    $objCtrConnection = new ctrConnection();
    $link = $objCtrConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
    $select = "SELECT * FROM USUARIO WHERE USERNAME ='" . $username . "'";
    
    $recordSet = $objCtrConnection->executeSQL($bd, $select);
    $search = mysql_fetch_array($recordSet);

    $this->objUserModel->setName($search['USERNAME']);
    $this->objUserModel->setPassword($search['PASSWORD']);
    $this->objUserModel->setCodigo($search['CODIGO']);
    $objCtrConnection->close($link);

    if (!$recordSet) {
      die("ERROR CON EL COMANDO SQL: " . mysql_error());
    } else {
      $this->recordSet = $recordSet;
    }
  }
}