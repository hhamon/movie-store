<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version3 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('movie_order', 'status', 'string', '10', array(
             'notnull' => '1',
             'default' => 'created',
             ));
    }

    public function down()
    {
        $this->removeColumn('movie_order', 'status');
    }
}