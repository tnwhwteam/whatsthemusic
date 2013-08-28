<?php

namespace WhatsTheMusic\Controller;

class AnswerController extends AbstractController
{
    public function get()
    {
        return $this->template->twig->render('index.html'); 
    }
}