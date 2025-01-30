<?php

global $db;
$db = new BDD();
function getAllLiaisons(): array
{
	$query = "SELECT * FROM liaison";
	return $db->select($query);
}

