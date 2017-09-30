<?php
class API
{
	/**
	 * @var $pdo will hold the PDO object
	 */
	private $pdo;
	
	/**
	 * This will create the PDO object
	 * a PDO object can be passed, can be used for unit testing purposes
	 */
	public function __construct($pdo = NULL)
	{

		# Set the header
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json; charset=utf-8'); 

		if($pdo != NULL)
		{

			$this->pdo = $pdo;
		}
		else
		{
			try
			{

				$this->pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
			
			}
			catch (PDOException $e)
			{

	    		echo json_encode(array('status' => 500, 'message' => $e->getMessage()));
	    		http_response_code(500);
	    		die();

			}


		}
		
		
	}





		#############################################
		#############################################
		##########  Store information API  ##########
		#############################################
		#############################################

	# API for listing information of all stores / a specific store
	public function stores($store_id = NULL)
	{
		$pdo = $this->pdo;
		$data = array();
		$status;
	
		# Check if we got passed a store id
		if($store_id == NULL)
		{

			# Select all information from the stores table
			$res = $pdo->prepare('SELECT * FROM stores');
			$res->execute();

			# Save the information to the data array
			$data = $res->fetchAll(PDO::FETCH_ASSOC);
			$status = 200;

		}
		else 
		{

			# Check that we're working with an integer
			if(!filter_var($store_id, FILTER_VALIDATE_INT))
			{	
				# Looks like we got something else
				$status = 400;
			}
			else
			{	
				# We got an integer

				# Get the count of rows to check if
				# we can find a store with the id we got
				$params = array(':store_id' => $store_id);
				$res = $pdo->prepare('SELECT count(*) FROM stores WHERE id = :store_id');
				$res->execute($params);

				# Check that we got a row
				if($res->fetchColumn() > 0)
				{
					
					# Select the store's information
					$res = $pdo->prepare('SELECT * FROM stores WHERE id = :store_id');
					$res->execute($params);

					$data = $res->fetch(PDO::FETCH_ASSOC);
					$status = 200;

				}
				else
				{
					# Looks like that store doesn't exist
					$status = 404;
				}
			}

		}

		# Return the status code & data we collected
		http_response_code($status);
		return json_encode(array('status' => $status, 'info' => $data), JSON_NUMERIC_CHECK);
	}





		###############################################
		###############################################
		##########  Stores with product API  ##########
		###############################################
		###############################################

	# API to list the stores that have a product
	public function stores_with_product($product_id = NULL)
	{
		$pdo = $this->pdo;
		$data = array();
		$status;
	
		# Check if we got passed a product id
		if($product_id == NULL)
		{

			# Seemms like we didn't get one, this API won't work without one,
			# so this is an invalid API query
			$status = 400;

		}
		else 
		{

			# We have something to work with

			# Check that we're working with an integer
			if(!filter_var($product_id, FILTER_VALIDATE_INT))
			{
				# Looks like we got something else
				$status = 400;
			}
			else
			{
				
				# We got an integer, yay!
				
				# Select the store ids and store names of the stores that have
				# the product that we are looking for
				$params = array(':product_id' => $product_id);
				$res = $pdo->prepare('
					SELECT stores.id, stores.name
					FROM stores
					INNER JOIN store_products
					ON stores.id = store_products.store_id
					WHERE store_products.product_id = :product_id'
				);
				$res->execute($params);

				$status = 200;
				$data = $res->fetchAll(PDO::FETCH_ASSOC);

			}

		}

		# Return the status code & data we collected
		http_response_code($status);
		return json_encode(array('status' => $status, 'stores' => $data), JSON_NUMERIC_CHECK);
	}






		#############################################
		#############################################
		##########  Products in store API  ##########
		#############################################
		#############################################


	# API to list the stores that have a product
	public function store_products($store_id = NULL)
	{
		$pdo = $this->pdo;
		$data = array();
		$status;
	
		# Check if we got passed a product id
		if($store_id == NULL)
		{

			# Seemms like we didn't get one, this API won't work without one,
			# so this is an invalid API query
			$status = 400;

		}
		else 
		{

			# We have something to work with

			# Check that we're working with an integer
			if(!filter_var($store_id, FILTER_VALIDATE_INT))
			{
				# Looks like we got something else
				$status = 400;
			}
			else
			{
				
				# We got an integer, yay!

				$params = array(':store_id' => $store_id);
				$res = $pdo->prepare('SELECT count(*) FROM stores WHERE id = :store_id');
				$res->execute($params);

				# Check that we got a row
				if($res->fetchColumn() > 0)
				{
					
					$params = array(':store_id' => $store_id);
					$res = $pdo->prepare('
						SELECT store_products.product_id
						FROM store_products
						INNER JOIN stores
						ON stores.id = store_products.store_id
						WHERE store_products.store_id = :store_id'
					);
					$res->execute($params);

					$status = 200;
					while($row = $res->fetch(PDO::FETCH_ASSOC))
					{
						array_push($data, $row['product_id']);
					}

				}
				else
				{
					# Looks like that store doesn't exist
					$status = 404;
				}
				
				# Select the store ids and store names of the stores that have
				# the product that we are looking for
				

			}

		}
		
		# Return the status code & data we collected
		http_response_code($status);
		return json_encode(array('status' => $status, 'products' => $data), JSON_NUMERIC_CHECK);
	}

}