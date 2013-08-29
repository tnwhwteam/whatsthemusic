<?php

namespace WhatsTheMusic\Controller\Question;

use WhatsTheMusic\Controller\AbstractController;

class One extends AbstractController
{
    public function get()
    {
        return array('_view' => 'question/index.html');
    }
}