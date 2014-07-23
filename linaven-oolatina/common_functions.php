<?php

//common functions

function connectDatabase($is_ajax = true)
{
	$connection = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$connection)
	{
		if($is_ajax)
		{
			echo jsonEncode('Cannot connect to database server', false);
			die;
		}
		else
		{
			die('Cannot connect to database server');
		}
	}

	$selectdb = mysql_select_db(DB_DATABASE);
	if(!$selectdb)
	{
		if($is_ajax)
		{
			echo jsonEncode('Cannot select database', false);
			die;
		}
		else
		{
			die('Cannot select database');
		}
	}
}

function closeConnection()
{
	mysql_close();
}

function escapseString($string)
{
	if(get_magic_quotes_gpc()) return $string;

	return mysql_real_escape_string($string);
}


function jsonEncode($data, $result = true)
{
	return json_encode(array(
		'data'		=> $data,
		'result'	=> $result
	));
}
