<?php

namespace WhatsTheMusic\Controller;

use Respect\Rest\Routable;

class QuestionController implements Routable
{
    public function get()
    {
        return array('_view' => 'index.html');
    }
}