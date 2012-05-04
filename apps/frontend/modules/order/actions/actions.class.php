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
        $user = $this->getUser();

        $this->forwardIf($user->getOrder(), 'order', 'editOrder');
        $this->forward404Unless($cart = $user->getCart());

        $table = MovieOrderTable::getInstance();

        $order = $table->newOrder($cart);
        $order->setOwner($user->getGuardUser());
        $order->setReference('MV-'.uniqid());
        $order->updateAmount();
        $order->save();

        $user->setOrder($order->getReference());

        $this->redirect('order_edit');
    }

    public function executeEditOrder(sfWebRequest $request)
    {
        $user = $this->getUser();

        $this->forward404Unless($reference = $user->getOrder());

        $table = MovieOrderTable::getInstance();
        $this->forward404Unless($this->order = $table->findOrder($reference));

        $this->form = new MovieOrderForm($this->order, array(
            'confirm_order' => $request->hasParameter('confirm_order'),
        ));

        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();

                if ($request->hasParameter('confirm_order')) {
                    $user->removeOrder();
                    $this->redirect('account');
                }

                $this->redirect('order_edit');
            }
        }

        $this->setTemplate('order');
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
