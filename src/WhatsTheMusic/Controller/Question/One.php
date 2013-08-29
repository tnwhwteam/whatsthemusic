<?php

namespace WhatsTheMusic\Controller\Question;

use WhatsTheMusic\Controller\AbstractController;

class One extends AbstractController
{
    public function get($quizId, $questionId)
    {
        $quiz = $this->em->getRepository('WhatsTheMusic\Entity\Quiz')->find($quizId);
        $question = $this->em->getRepository('WhatsTheMusic\Entity\Question')->find($questionId);

        if (!$quiz->getQuestions()->contains($question)) {
            throw new \Exception("quiz not found", 404);
        }

        return array(
            '_view' => 'question/single.html',
            'question' => $question,
            'quiz' => $quiz
        );
    }
}