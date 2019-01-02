<?php
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
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
		//--------------Se ejecuta Comando SQL-------------------------
    $insert = "INSERT INTO PERSONA 
    (IDENTIFICACION, TIPO_ID, N_COMPLETO, 
    COD_TPERSONA, F_NACIMIENTO, DIRECCION, 
    EMAIL, COD_GENERO, COD_SALUD, COD_TSALUD, 
    COD_COMITE, COD_NACADEMICO) 
    VALUES 
    (" . $id . ", " . $id_type . ", '" . $fullname . "', 
    " . $cod_tper . ", '" . $birth_date . "', '" . $address . "', 
    '" . $email . "', " . $cod_gender . ", " . $cod_health . ", " . $cod_thealth . ",
     " . $cod_committee . ", " . $cod_knowledge . ")";

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
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
                    //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT P.IDENTIFICACION AS ID,
            P.N_COMPLETO AS NOMBRE,
            P.F_NACIMIENTO AS FECHA,
            (SELECT TIMESTAMPDIFF(YEAR,P.F_NACIMIENTO,CURDATE())) AS EDAD,
            P.DIRECCION,
            C.DESCRIPCION AS COMITE

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
    $mat[0][0] = 6;
            //Recorre el array y incrementa el valor de contador
    while ($search = mysql_fetch_array($recordSet)) {
      $mat[$i][1] = $search['ID'];
      $mat[$i][2] = $search['NOMBRE'];
      $mat[$i][3] = $search['FECHA'];
      $mat[$i][4] = $search['EDAD'];
      $mat[$i][5] = $search['DIRECCION'];
      $mat[$i][6] = $search['COMITE'];
      $i = $i + 1;
    }
            //Cierra la conexión con la BD
    $oConnection->close($link);
            //Devuelve el array bidimensional con los registros encontrados en la BD
    return $mat;
  }

  function afiliado_detail()
  {
    $id = $this->oPerson->getId();
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
            //--------------Se ejecuta Comando SQL-------------------------
    $select = "SELECT 
      P.IDENTIFICACION AS ID,
      TI.CODIGO AS COD_TI,
      TI.DESCRIPCION AS TIPO_ID,
      P.N_COMPLETO AS NOMBRE,
      P.F_NACIMIENTO AS FECHA,
      (SELECT TIMESTAMPDIFF(YEAR,P.F_NACIMIENTO,CURDATE())) AS EDAD,
      P.DIRECCION,
      P.EMAIL,
      G.CODIGO AS COD_GENERO,
      G.DESCRIPCION AS GENERO,
      S.CODIGO AS COD_SALUD,
      S.ENTIDAD AS SALUD,
      TS.CODIGO AS COD_TSALUD,
      TS.TIPO AS TSALUD,
      C.CODIGO AS COD_COMITE,
      C.DESCRIPCION AS COMITE,
      NA.CODIGO AS COD_NIVEL,
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
      WHERE P.COD_TPERSONA = 1
    AND P.IDENTIFICACION = ".$id."";
            //  echo " Comando SQL : ". $select;
    //Obtiene los registros de la consulta
    $recordSet = $oConnection->executeSQL($bd, $select);
    //Inicializa el contador
    $i = 0;
    //Inicializa las dimensiones del array bidimiensional
    $mat[0][0] = 18;
    //Recorre el array y incrementa el valor de contador
    while ($search = mysql_fetch_array($recordSet)) {
      $mat[$i][1] = $search['ID'];
      $mat[$i][2] = $search['COD_TI'];
      $mat[$i][3] = $search['TIPO_ID'];
      $mat[$i][4] = $search['NOMBRE'];
      $mat[$i][5] = $search['FECHA'];
      $mat[$i][6] = $search['EDAD'];
      $mat[$i][7] = $search['DIRECCION'];
      $mat[$i][8] = $search['EMAIL'];
      $mat[$i][9] = $search['COD_GENERO'];
      $mat[$i][10] = $search['GENERO'];
      $mat[$i][11] = $search['COD_SALUD'];
      $mat[$i][12] = $search['SALUD'];
      $mat[$i][13] = $search['COD_TSALUD'];
      $mat[$i][14] = $search['TSALUD'];
      $mat[$i][15] = $search['COD_COMITE'];
      $mat[$i][16] = $search['COMITE'];
      $mat[$i][17] = $search['COD_NIVEL'];
      $mat[$i][18] = $search['NIVEL'];
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
    $id = $this->oPerson->getId();
    $description = $this->oPerson->getDescription();
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
    $id = $this->oPerson->getId();
		//---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
            //---------NOS CONECTAMOS A LA BASE DE DATOS-----------------------------------------------------------
    $bd = "afiliados_jac";
    $oConnection = new ctrConnection();
    $link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
            
		//--------------Se ejecuta Comando SQL-------------------------
    $delete = "DELETE FROM persona where IDENTIFICACION =" . $id . "";
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