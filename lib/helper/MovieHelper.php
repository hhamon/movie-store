<?php

function movie_category($type)
{
    $categories = MovieTable::getMovieTypes();

    return isset($categories[$type]) ? $categories[$type] : '-';
}


function movie_support($support)
{
    $supports = MovieTable::getMovieSupports();

    return isset($supports[$support]) ? $supports[$support] : '-';
}