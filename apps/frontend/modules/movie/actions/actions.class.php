<?php

class movieActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $table = MovieTable::getInstance();

        $this->movies = $table->getAll();
    }

    public function executeCategory(sfWebRequest $request)
    {
        $table    = MovieTable::getInstance();
        $category = $request->getUrlParameter('category');

        $this->movies = $table->getByCategory($category);

        $this->setTemplate('index');
    }

    public function executeSearch(sfWebRequest $request)
    {
        $table    = MovieTable::getInstance();

        $form = new MovieSearchFormFilter();
        $form->setQuery($table->getStandardMovieQuery());

        if ($request->isMethod('POST')) {
            $form->bind($request->getParameter($form->getName()));
        }

        $this->movies = $form->getQuery()->execute();
        $this->keyword = current($form->getValue('keyword'));

        $this->setTemplate('index');
    }
}
