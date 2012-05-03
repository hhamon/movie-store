<?php

class MovieSearchFormFilter extends MovieFormFilter
{
    public function configure()
    {
        parent::configure();

        $this->widgetSchema['keyword'] = new  sfWidgetFormFilterInput(array('with_empty' => false));
        $this->validatorSchema['keyword'] = new sfValidatorPass();

        $this->widgetSchema['director'] = new sfWidgetFormChoice(array(
            'choices' => array_merge(
                array('' => ''),
                $this->getTable()->getDirectors()
            ),
        ));

        $this->useFields(array('keyword', 'type', 'director'));
    }

    public function addKeywordColumnQuery(Doctrine_Query $q, $field, $value)
    {
        if (!empty($value['text'])) {
            $alias = $q->getRootAlias();
            $q
                ->addWhere(
                    '('.$alias.'.title LIKE ? OR '.$alias.'.synopsis LIKE ?)',
                    array(
                        '%'.$value['text'].'%',
                        '%'.$value['text'].'%',
                    )
                )
            ;
        }
    }

    public function addDirectorColumnQuery(Doctrine_Query $query, $field, $value)
    {
        if (!empty($value)) {
            $alias = $query->getRootAlias();
            $query->addWhere($alias.'.director = ?', $value);
        }
    }
}