<?php

namespace WhatsTheMusic\Controller;

class QuestionController extends AbstractController
{
    public function get()
    {
        return array('_view' => 'question/index.html');
    }
}