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

        $test = json_decode($API->stores(10), TRUE);
        $this->assertEquals(404, $test['status'])

        $test = json_decode($API->stores('invalid_id'), TRUE);
        $this->assertEquals(400, $test['status'];

    }
   
}

