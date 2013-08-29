<?php

namespace WhatsTheMusic\Controller\Quiz;

use WhatsTheMusic\Controller\AbstractController;

/**
* Finish Quiz Controller
*/
class Highscore extends AbstractController
{
    public function post($quizId)
    {
        $quiz = $this->em->getRepository('WhatsTheMusic\Entity\Quiz')->find($quizId);

        $name = filter_input(INPUT_POST, 'name');

        if (!$quiz || !$name) {
            throw new \Exception("quiz not found", 404);
        }

        session_start();
        $max = $_SESSION['quiz']['rightAnswers'];

        $quiz->setMaxPoints($max);
        $quiz->setMaxPointsBy($name);

        $this->em->persist($quiz);
        $this->em->flush();

        header("Location: /");
    }
}