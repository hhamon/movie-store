<?php

class movieComponents extends sfComponents
{
    public function executeCategories()
    {
        $this->categories = MovieTable::getMovieTypes();
    }

    public function executeSearch(sfWebRequest $request)
    {
        $this->form = new MovieSearchFormFilter();

        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter($this->form->getName()));
        }
    }
}
