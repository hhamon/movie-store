<?php

class MovieOrderTest extends PHPUnit_Framework_TestCase
{
    public function testSetReferenceTruncatesReference()
    {
        $order = new MovieOrder();
        $order->setReference('MV-1234567890');

        $this->assertEquals('MV-1234567', $order->getReference());
    }

    public function testUpdateAmoutWithMocks()
    {
        $items = array(
            $this->getMovieOrderItemMock(2, 10),
            $this->getMovieOrderItemMock(4, 5),
            $this->getMovieOrderItemMock(1, 12),
        );

        $collection = $this
            ->getMockBuilder('Doctrine_Collection')
            ->disableOriginalConstructor()
            ->setMethods(array('getIterator'))
            ->getMock()
        ;
        $collection
            ->expects($this->any())
            ->method('getIterator')
            ->will($this->returnValue(new ArrayIterator($items)))
        ;

        $order = new MovieOrder();
        $order->set('Items', $collection);
        $order->updateAmount();

        $this->assertEquals(52, $order->getAmount());
        $this->assertEquals(10.19, $order->getVat());
        $this->assertEquals(62.19, $order->getTotal());
    }

    private function getMovieOrderItemMock($quantity, $price)
    {
        $mock = $this
            ->getMockBuilder('MovieOrderItem')
            ->disableOriginalConstructor()
            ->setMethods(array('getUnitPrice', 'getQuantity'))
            ->getMock()
        ;

        $mock
            ->expects($this->once())
            ->method('getUnitPrice')
            ->will($this->returnValue($price))
        ;

        $mock
            ->expects($this->once())
            ->method('getQuantity')
            ->will($this->returnValue($quantity))
        ;

        return $mock;
    }

    public function testUpdateAmount()
    {
        $movie1 = new Movie();
        $movie1->setId(1);
        $movie1->setPrice(10);

        $movie2 = new Movie();
        $movie2->setId(2);
        $movie2->setPrice(5);

        $movie3 = new Movie();
        $movie3->setId(3);
        $movie3->setPrice(12);

        $cart = array(
            $movie1->getId() => 2,
            $movie2->getId() => 4,
            $movie3->getId() => 1,
        );

        $order = new MovieOrder();
        $order->setMovies(array($movie1, $movie2, $movie3));
        $order->setCart($cart);
        $order->init();
        $order->updateAmount();

        $this->assertEquals(52, $order->getAmount());
        $this->assertEquals(10.19, $order->getVat());
        $this->assertEquals(62.19, $order->getTotal());
    }
}