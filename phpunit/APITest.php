<?php

require_once(__DIR__ . '/../api/API.php');

class APITest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PDO
     */
    private $pdo;

    public function setUp()
    {

        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testStores()
    {
        $API = new API($this->pdo);

        $test = json_decode($API->stores(), TRUE);
        $this->assertEquals(200, $test['status']);

        $this->assertArrayHasKey('id', $test['info'][0]);
        $this->assertArrayHasKey('name', $test['info'][0]);
        $this->assertArrayHasKey('address', $test['info'][0]);
        $this->assertArrayHasKey('phone', $test['info'][0]);
        $this->assertArrayHasKey('email', $test['info'][0]);

        $test = json_decode($API->stores(1), TRUE);
        $this->assertEquals(200, $test['status']);

        $this->assertArrayHasKey('id', $test['info'][0]);
        $this->assertArrayHasKey('name', $test['info'][0]);
        $this->assertArrayHasKey('address', $test['info'][0]);
        $this->assertArrayHasKey('phone', $test['info'][0]);
        $this->assertArrayHasKey('email', $test['info'][0]);

        $test = json_decode($API->stores(10), TRUE);
        $this->assertEquals(404, $test['status']);

        $test = json_decode($API->stores('invalid_id'), TRUE);
        $this->assertEquals(400, $test['status']);

        $test = json_decode($API->stores(3.33), TRUE);
        $this->assertEquals(400, $test['status']);

    }

    public function testStores_with_product()
    {
        $API = new API($this->pdo);

        $test = json_decode($API->stores_with_product(2), TRUE);
        $this->assertEquals(200, $test['status']);

        $this->assertArrayHasKey('id', $test['stores'][0]);
        $this->assertArrayHasKey('name', $test['stores'][0]);

        $test = json_decode($API->stores_with_product(), TRUE);
        $this->assertEquals(400, $test['status']);

        $test = json_decode($API->stores_with_product('invalid_id'), TRUE);
        $this->assertEquals(400, $test['status']);

        $test = json_decode($API->stores_with_product(3.33), TRUE);
        $this->assertEquals(400, $test['status']);

    }

    public function testStore_products()
    {
        $API = new API($this->pdo);

        $test = json_decode($API->store_products(1), TRUE);
        $this->assertEquals(200, $test['status']);

        $test = json_decode($API->store_products('invalid_id'), TRUE);
        $this->assertEquals(400, $test['status']);

        $test = json_decode($API->store_products(3.33), TRUE);
        $this->assertEquals(400, $test['status']);

        $test = json_decode($API->store_products(10), TRUE);
        $this->assertEquals(404, $test['status']);


    }
   
}

