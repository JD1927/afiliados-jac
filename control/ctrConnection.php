<?php
class ctrConnection
{
	var $link;
	function connect($server, $db, $user, $password)
	{
		try {
			$link = mysql_connect($server, $user, $password);
		} catch (Exception $e) {
			echo "ERROR SERVER Connection " . $e->getMessage() . "\n";
		}
		try {
			mysql_select_db($db, $link);
		} catch (Exception $e) {
			echo "ERROR FINDING THE DATABASE" . $e->getMessage() . "\n";
		}
		return $link;
	}
	function close($link)
	{
		try {
			mysql_close($link);
		} catch (Exception $e) {
			echo "ERROR CLOSING SERVER Connection" . $e->getMessage() . "\n";
		}
	}
	function executeSQL($db, $select)
	{
		try {
			$recordSet = mysql_db_query($db, $select);
		} catch (Exception $e) {
			echo " ERROR EXECUTING SQL TASK: " . $e->getMessage() . "\n";
		}
		return $recordSet;
	}
}
?>