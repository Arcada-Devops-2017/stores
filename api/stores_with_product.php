<?php

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