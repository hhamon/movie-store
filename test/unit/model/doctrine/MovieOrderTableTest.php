<?php

class MovieOrderTableTest extends PHPUnit_Framework_TestCase
{
    private $table;

    protected function setUp()
    {
        Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');

        $this->table = MovieOrderTable::getInstance();
    }

    protected function tearDown()
    {
        $this->table = null;
    }

    /**
     * @dataProvider provideUsers
     *
     */
    public function testFindUserOrders($username, $count)
    {
        $user = sfGuardUserTable::getInstance()->findOneByUsername($username);

        $this->assertCount($count, $this->table->findUserOrders($user->getId()));
    }

    public function provideUsers()
    {
        return array(
            array('hhamon', 2),
            array('jsmith', 1),
        );
    }
}