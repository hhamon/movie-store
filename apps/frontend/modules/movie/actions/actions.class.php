<?php

class movieActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $table = MovieTable::getInstance();

        $this->movies = $table->getAll();
    }
}
