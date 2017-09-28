<?php

class StoresTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PDO
     */
    private $pdo;

    public function setUp()
    {

        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $this->pdo->query("
        	CREATE TABLE IF NOT EXISTS `stores` (
  			`id` int(11) NOT NULL AUTO_INCREMENT,
  			`name` varchar(50) COLLATE latin1_general_ci NOT NULL,
		 	`address` varchar(200) COLLATE latin1_general_ci NOT NULL,
			`phone` varchar(15) COLLATE latin1_general_ci NOT NULL,
			`email` varchar(100) COLLATE latin1_general_ci NOT NULL,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;");

    	$this->pdo->query("
    		CREATE TABLE IF NOT EXISTS `store_products` (
			`store_id` int(50) NOT NULL,
			`product_id` int(50) NOT NULL,
			KEY `store_id` (`store_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;");

    	$this->pdo->query("
    		ALTER TABLE `store_products`
  			ADD CONSTRAINT `store_products_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;");

    	$this->pdo->query("
    		INSERT INTO `stores` (`id`, `name`, `address`, `phone`, `email`) VALUES (NULL, 'Test 1', 'Test address', '1234567', 'test@email.com'), (NULL, 'Test 2', 'Test address 2', '2345678', 'test2@email.com')");

    	$this->pdo->query("
    		INSERT INTO `store_products` (`store_id`, `product_id`) VALUES ('1', '1'), ('2', '2'), ('2', '3'), ('1', '2'), ('1', '4')");
    }

    public function tearDown()
    {
        $this->pdo->query("DROP DATABASE stores_test");
    }

    public function testStores()
    {
        $API = new API($this->pdo);
        $test = json_decode($API->stores(), TRUE);

        $this->assertEquals(200, $test["status"]);
    }
   
}

