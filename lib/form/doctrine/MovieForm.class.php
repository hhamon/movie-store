<?php

/**
 * Movie form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MovieForm extends BaseMovieForm
{
    public function configure()
    {
        $this->useFields(array('title', 'synopsis', 'director', 'shot_year', 'duration', 'support', 'image', 'type', 'price', 'created_at', 'updated_at'));

        $this->widgetSchema['title'] = new sfWidgetFormInputText();

        $this->widgetSchema['shot_year']->setAttribute('size', 4);
        $this->widgetSchema['duration']->setAttribute('size', 4);
        $this->widgetSchema['price']->setAttribute('size', 6);

        $this->widgetSchema['support'] = new sfWidgetFormChoice(array(
            'expanded' => true,
            'choices' => MovieTable::getMovieSupports(),
        ));

        $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
            'choices' => MovieTable::getMovieTypes(),
        ));

        $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
            'file_src'    => $this->object->getImagePath(),
            'edit_mode'   => !$this->isNew(),
            'is_image'    => true,
            'with_delete' => false,
        ));

        $this->validatorSchema['price']->setOption('min', 0);
        $this->validatorSchema['duration']->setOption('min', 1);
        $this->validatorSchema['shot_year']->setOption('min', 1895);
        $this->validatorSchema['shot_year']->setOption('max', date('Y', strtotime('+2 years')));

        $this->validatorSchema['type'] = new sfValidatorChoice(array(
            'choices' => array_keys(MovieTable::getMovieTypes()),
        ));

        $this->validatorSchema['support'] = new sfValidatorChoice(array(
            'choices' => array_keys(MovieTable::getMovieSupports()),
        ));

        $this->validatorSchema['image'] = new sfValidatorFile(array(
            'required' => false,
            'mime_types' => 'web_images',
            'max_size' => 1024 * 100,
            'path' => sfConfig::get('sf_web_dir').'/'.Movie::IMAGE_DIR,
        ));
    }
}
