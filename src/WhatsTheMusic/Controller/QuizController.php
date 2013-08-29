<?php

namespace WhatsTheMusic\Controller;

class QuizController extends AbstractController
{
    public function get($id)
    {
        $quiz = $this->em->getRepository('WhatsTheMusic\Entity\Quiz')->find($id);

        if (!$quiz) {
            throw new \Exception("quiz not found", 404);
        }

        return array(
            '_view' => 'quiz/index.html',
            'quiz' => $quiz
        );
    }
}