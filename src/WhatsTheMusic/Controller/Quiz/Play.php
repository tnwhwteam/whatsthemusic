<?php

namespace WhatsTheMusic\Controller\Quiz;

use WhatsTheMusic\Controller\AbstractController;

/**
* Game Controller
*/
class Play extends AbstractController
{
    public function get($id)
    {
        session_start();
        $questions = $_SESSION['quiz']['questions'];

        if(empty($_SESSION['quiz']['questions'])){
            header("Location: /quiz/{$id}/init");
        }

        return array(
            '_view' => 'quiz/play.html', 
            'quiz' => $id,
            'questions' => $questions
        );
    }
}