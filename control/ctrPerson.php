<?
class ctrPerson
{
  var $oPerson;
  var $recordSet;
  function ctrPerson($oPerson)
  {
    //Obtiene el objeto de ÁreaModel
    $this->oPerson = $oPerson;
  }
  function create()
  {
    //Obtiene los valores ingresados en la vista
    $id = $this->oPerson->getId();
    $id_type = $this->oPerson->getIdType();
    $fullname = $this->oPerson->getFullname();
    $cod_tper = $this->oPerson->getCodTper();
    $birth_date = $this->oPerson->getBirthDate();
    $address = $this->oPerson->getAddress();
    $email = $this->oPerson->getEmail();
    $cod_gender = $this->oPerson->getCodGender();
    $cod_health = $this->oPerson->getCodHealth();
    $cod_thealth = $this->oPerson->getCodTHealth();
    $cod_committee = $this->oPerson->getCodCommittee();
    $cod_knowledge = $this->oPerson->getCodKnowledge();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
		//--------------Se ejecuta Comando SQL-------------------------
    $insert = "INSERT INTO PERSONA 
    (IDENTIFICACION, TIPO_ID, N_COMPLETO, 
    COD_TPERSONA, F_NACIMIENTO, DIRECCION, 
    EMAIL, COD_GENERO, COD_SALUD, COD_TSALUD, 
    COD_COMITE, COD_NACADEMICO) 
    VALUES 
    (".$id.", ".$id_type.", '".$fullname."', 
    ".$cod_tper.", '".$birth_date."', '".$address."', 
    '".$email."', ".$cod_gender.", ".$cod_health.", ".$cod_thealth.",
     ".$cod_committee.", ".$cod_knowledge.")";
    
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
  function afiliados_list()
  {
    
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
            //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT P.IDENTIFICACION AS ID,
    TI.DESCRIPCION AS TIPO_ID,
    P.N_COMPLETO AS NOMBRE,
    P.F_NACIMIENTO AS FECHA,
    (SELECT TIMESTAMPDIFF(YEAR,P.F_NACIMIENTO,CURDATE())) AS EDAD,
    P.DIRECCION,
    P.EMAIL,
    G.DESCRIPCION AS GENERO,
    S.ENTIDAD AS SALUD,
    TS.TIPO AS TSALUD,
    C.DESCRIPCION AS COMITE,
    NA.NIVEL AS NIVEL
    FROM PERSONA P INNER JOIN TIPO_ID TI 
    ON P.TIPO_ID = TI.CODIGO
    INNER JOIN TIPO_PERSONA TP
    ON P.COD_TPERSONA = TP.CODIGO
    INNER JOIN GENERO G
    ON P.COD_GENERO = G.CODIGO
    INNER JOIN SALUD S 
    ON P.COD_SALUD = S.CODIGO
    INNER JOIN TIPO_SALUD TS
    ON P.COD_TSALUD = TS.CODIGO
    INNER JOIN COMITE C
    ON P.COD_COMITE = C.CODIGO
    INNER JOIN N_ACADEMICO NA
    ON P.COD_NACADEMICO = NA.CODIGO
    WHERE P.COD_TPERSONA = 1";
            //  echo " Comando SQL : ". $select;
    //Obtiene los registros de la consulta
    $recordSet = $oConnection->executeSQL($bd, $select);
    //Inicializa el contador
    $i = 0;
    //Inicializa las dimensiones del array bidimiensional
    $mat[0][0] = 12;
    //Recorre el array y incrementa el valor de contador
    while ($search = mysql_fetch_array($recordSet)) {
      $mat[$i][1] = $search['ID'];
      $mat[$i][2] = $search['TIPO_ID'];
      $mat[$i][3] = $search['NOMBRE'];
      $mat[$i][4] = $search['FECHA'];
      $mat[$i][5] = $search['EDAD'];
      $mat[$i][6] = $search['DIRECCION'];
      $mat[$i][7] = $search['EMAIL'];
      $mat[$i][8] = $search['GENERO'];
      $mat[$i][9] = $search['SALUD'];
      $mat[$i][10] = $search['TSALUD'];
      $mat[$i][11] = $search['COMITE'];
      $mat[$i][12] = $search['NIVEL'];
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
    $code = $this->oPerson->getCode();
    $description = $this->oPerson->getDescription();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
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
    $code = $this->oPerson->getCode();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "AFILIADOS_JAC";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', 'krBkP6wK2QRax9A');
            
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