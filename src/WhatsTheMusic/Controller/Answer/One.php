<?php

namespace WhatsTheMusic\Controller\Answer;

use WhatsTheMusic\Controller\AbstractController;

class One extends AbstractController
{
    public function get()
    {
        return $this->template->twig->render('index.html'); 
    }
}