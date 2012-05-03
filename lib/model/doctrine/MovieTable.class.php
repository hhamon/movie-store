<?php

/**
 * MovieTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MovieTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Movie');
    }

    static public function getMovieSupports()
    {
        return array(
            'dvd'     => 'DVD',
            'vhs'     => 'VHS',
            'avi'     => 'AVI',
            'blueray' => 'Blue Ray',
        );
    }

    static public function getMovieTypes()
    {
        return array(
            'action'      => 'Action',
            'aventure'    => 'Aventure',
            'cartoon'     => 'Cartoon',
            'comedy'      => 'Comedy',
            'documentary' => 'Documentary',
            'horror'      => 'Horror',
            'romance'     => 'Romantic',
            'scifi'       => 'Science Fiction',
            'thriller'    => 'Thriller',
        );
    }
}