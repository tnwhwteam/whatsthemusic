<?php

namespace WhatsTheMusic\Controller;

use Respect\Rest\Routable;

class AnswerController implements Routable
{
    /**
     * @var $template Twig_Environment
     */
    private $template;

    public function __construct($twig)
    {
        $this->template = $twig;
    }

    public function get()
    {
        return $this->template->twig->render('index.html'); 
    }
}