<?php
    $db_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    DEFINE ("DB_HOST", $db_url["host"]);
    DEFINE ("DB_USER", $db_url["user"]);
    DEFINE ("DB_PASS", $db_url["pass"]); 
    DEFINE ("DB_NAME", substr($db_url["path"], 1));

    $active_group = 'default';
    $query_builder = TRUE;
	
	$Company_Name = "DERDC";
	DEFINE ("COMPANY_NAME", $Company_Name);
?>