<?php
	
	# Set the header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; charset=utf-8');
	
	require_once "config.php";

	$API = new API();

	if( isset( $_REQUEST['store'] ) )
	{
		echo $API->stores( $_REQUEST['store'] );
	}
	else
	{
		echo $API->stores();	
	}

	
?>