<?php

/**
 * order actions.
 *
 * @package    sf_sandbox
 * @subpackage order
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class orderActions extends sfActions
{
    public function executeOrder(sfWebRequest $request)
    {
        $cart = $this->getUser()->getCart();
        $this->forward404Unless($cart);

        $table = MovieOrderTable::getInstance();

        $this->order = $table->newOrder($cart);
        $this->order->setOwner($this->getUser()->getGuardUser());
        $this->order->setReference('MV-'.uniqid());
        $this->order->updateAmount();
        $this->order->save();

        $this->getUser()->setOrder($this->order->getReference());
    }

    public function executeAddMovie(sfWebRequest $request)
    {
        $table = MovieTable::getInstance();
        $movie = $table->findOneBySlug($request->getUrlParameter('slug'));

        $this->forward404Unless($movie);

        $this->getUser()->addMovie($movie->getId());

        $this->redirect('homepage');
    }
}
