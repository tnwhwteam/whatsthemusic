<?php

namespace WhatsTheMusic\Controller;

use Respect\Rest\Routable;

class AnswerController implements Routable
{
    public function get()
    {
        return $this->template->twig->render('index.html'); 
    }
}