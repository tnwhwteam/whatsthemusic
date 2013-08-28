<?php

namespace WhatsTheMusic\Controller;

class QuizController extends AbstractController
{
    public function get()
    {
        return array(
            '_view' => 'about.html'
        );
    }
}