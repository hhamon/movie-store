<?php

require_once dirname(__FILE__).'/../lib/movieGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/movieGeneratorHelper.class.php';

/**
 * movie actions.
 *
 * @package    sf_sandbox
 * @subpackage movie
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class movieActions extends autoMovieActions
{
    public function executeOffer(sfWebRequest $request)
    {
        $table = MovieTable::getInstance();
        $movie = $table->find($request->getUrlParameter('id'));

        $this->forward404Unless($movie);

        $movie->setPrice(0.00);
        $movie->save();

        $this->redirect('movie');
    }
}
