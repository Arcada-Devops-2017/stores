<?php
	
	require_once "config.php";

	$API = new API();

	if( isset( $_REQUEST['store'] ) )
	{
		echo $API->store_products( $_REQUEST['store'] );
	}
	else
	{
		echo $API->store_products();	
	}

	
?>