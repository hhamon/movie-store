<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new SensioTestFunctional(new sfBrowser());
$browser->setTester('doctrine', 'sfTesterDoctrine');
$browser->loadFixtures();

$browser

    ->info('1- Go to the Cartoon category')
    ->get('/en/movies/cartoon')
    ->with('response')->begin()
        ->matches('/Roger Rabbit/')
        ->checkElement('#body .inner .leftbox', 1)
        ->isValid(true)
    ->end()

    ->info('2- Add Roger Rabbit to the cart')
    ->click('Buy now')
    ->followRedirect()

    ->info('3- Add Titanic to the cart')
    ->click('Buy now')
    ->followRedirect()

    ->click('Your order')

    ->info('4- Authenticate')
    ->click('Signin', array(
        'signin' => array(
            'username' => 'hhamon',
            'password' => 'secret',
        )
    ))
    ->followRedirect()
    ->followRedirect()

    ->info('5- Order details')
    ->click('Update', array(
        'order' => array(
            'address'  => 'Foo Bar Baz Foo',
            'zip_code' => '75008',
            'country'  => 'FR',
            'Items'    => array(
                0 => array('quantity' => 2),   // Roger Rabbit
                1 => array('quantity' => 3),   // Titanic
            )
        )
    ))
    ->with('form')->hasErrors(false)
    ->followRedirect()
    ->with('response')->begin()
        ->matches('/€59.00/')
        ->matches('/€11.56/')
        ->matches('/€70.56/')
    ->end()

    ->info('6- Confirm order')
    ->click('Confirm')

    ->with('doctrine')->check('MovieOrder', array(
        'status' => 'confirmed',
        'amount' => '59',
        //'vat'    => '11.56',
        //'total'  => '70.56',
    ))
    ->followRedirect()
;
