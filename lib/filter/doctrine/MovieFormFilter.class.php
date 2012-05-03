<?php

/**
 * Movie filter form.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MovieFormFilter extends BaseMovieFormFilter
{
    public function configure()
    {
        $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
            'choices' => MovieTable::getMovieTypes(),
        ));
    }

    public function addTypeColumnQuery(Doctrine_Query $query, $field, $value)
    {
        if (!empty($value)) {
            $alias = $query->getRootAlias();
            $query->addWhere($alias.'.type = ?', $value);
        }
    }
}
