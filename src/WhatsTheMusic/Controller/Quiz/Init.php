<?php

namespace WhatsTheMusic\Controller\Quiz;

use WhatsTheMusic\Controller\AbstractController;

class Init extends AbstractController
{
    public function get($id)
    {
        $quiz = $this->em->getRepository('WhatsTheMusic\Entity\Quiz')->find($id);

        if (!$quiz) {
            throw new \Exception("quiz not found", 404);
        }

        if (count($quiz->getQuestions()) == 0) {
            throw new \Exception("quiz don't have any question", 404);
        }

        $questions = $quiz->getQuestions()->toArray();
        shuffle($questions);

        session_start();

        $_SESSION['quiz']['id'] = $quiz->getId();
        $_SESSION['quiz']['questions'] = $questions;

        header('Location: /quiz/'.$quiz->getId().'/play');
    }
}