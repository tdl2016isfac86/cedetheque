<?php
function requete_sql($requete){
	$sql = mysql_connect(sql_server,sql_user,sql_pass);
	mysql_select_db(sql_database, $sql);
	$res = mysql_query($requete,$sql);
	
	mysql_close($sql);

	return $res;
}
