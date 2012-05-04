<?php

/**
 * account actions.
 *
 * @package    sf_sandbox
 * @subpackage account
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accountActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $table = MovieOrderTable::getInstance();
        $user  = $this->getUser()->getGuardUser();

        $this->orders = $table->findUserOrders($user->getId());
    }
}
