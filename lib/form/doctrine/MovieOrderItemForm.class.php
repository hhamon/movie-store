<?php

/**
 * MovieOrderItem form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MovieOrderItemForm extends BaseMovieOrderItemForm
{
    public function configure()
    {
        $this->useFields(array('quantity'));

        $this->validatorSchema['quantity']->setOption('required', true);
        $this->validatorSchema['quantity']->setOption('min', 1);
        $this->validatorSchema['quantity']->setOption('max', 10);

        $this->widgetSchema->setNameFormat('item[%s]');
    }
}
