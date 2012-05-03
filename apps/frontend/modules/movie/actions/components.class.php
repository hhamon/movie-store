<?php

class movieComponents extends sfComponents
{
    public function executeCategories()
    {
        $this->categories = MovieTable::getMovieTypes();
    }
}
