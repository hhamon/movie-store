<?php

class SensioTestFunctional extends sfTestFunctional
{
    public function loadFixtures()
    {
        Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');
    }
}