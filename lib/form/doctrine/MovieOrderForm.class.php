<?php

/**
 * MovieOrder form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MovieOrderForm extends BaseMovieOrderForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'address'  => new sfWidgetFormTextarea(),
            'zip_code' => new sfWidgetFormInputText(),
            'country'  => new sfWidgetFormI18nChoiceCountry(),
        ));

        $this->setValidators(array(
            'address'  => new sfValidatorString(
                array('min_length' => 10),
                array(
                    'required' => 'You must fill your delivery address',
                    'min_length' => 'Your address is too short, %min_length% characters minimum',
                )
            ),
            'zip_code' => new sfValidatorString(array(
                'min_length' => 3
            )),
            'country'  => new sfValidatorI18nChoiceCountry(),
        ));

        $this->embedRelation('Items');

        $this->widgetSchema->setNameFormat('order[%s]');
    }

    protected function doUpdateObject($values)
    {
        parent::doUpdateObject($values);

        $this->getObject()->updateAmount();

        if ($this->getOption('confirm_order')) {
            $this->getObject()->setStatus('confirmed');
        }
    }
}
