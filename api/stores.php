<?php
	
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