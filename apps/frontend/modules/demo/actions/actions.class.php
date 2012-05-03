<?php

/**
 * demo actions.
 *
 * @package    sf_sandbox
 * @subpackage demo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class demoActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $name = $request->getUrlParameter('name', 'world');

        $user = $this->getUser();
        $user->setAttribute('my_name', $name);

        //$response = $this->getResponse();
        //$response->setCookie('my_name', $name, '+30 days');

        $user->setFlash('notice', 'Your name has been saved.');

        $this->redirect('greet');
    }

    public function executeGreet(sfWebRequest $request)
    {
        //$this->name = $request->getCookie('my_name');
        $user = $this->getUser();
        $this->name = $user->getAttribute('my_name');

        $this->forward404Unless($this->name);

        $response = $this->getResponse();
        $response->setHttpHeader('x-debug', uniqid());
        $response->addCacheControlHttpHeader('private');
        $response->addCacheControlHttpHeader('maxage', 120);
        $response->setStatusCode(201);
    }
}
