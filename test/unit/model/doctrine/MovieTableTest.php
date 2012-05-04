<?php

class MovieTableTest extends PHPUnit_Framework_TestCase
{
    private $table;

    protected function setUp()
    {
        Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');

        $this->table = MovieTable::getInstance();
    }

    protected function tearDown()
    {
        $this->table = null;
    }

    public function testGetDirectors()
    {
        $this->assertCount(4, $this->table->getDirectors());
    }

    public function testGetAll()
    {
        $this->assertCount(5, $this->table->getAll());
    }

    /**
     * @dataProvider provideCategories
     *
     */
    public function testGetByCategory($category, $count)
    {
        $this->assertCount($count, $this->table->getByCategory($category));
    }

    public function provideCategories()
    {
        return array(
            array('scifi', 2),
            array('cartoon', 1),
            array('thriller', 1),
            array('romance', 1),
            array('action', 0),
        );
    }
}