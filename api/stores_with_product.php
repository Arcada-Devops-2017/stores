<?php
	
	# Set the header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; charset=utf-8');
	
	require_once "config.php";

	$API = new API();

	if( isset( $_REQUEST['product'] ) )
	{
		echo $API->stores_with_product( $_REQUEST['product'] );
	}
	else
	{
		echo $API->stores_with_product();	
	}

	
?>