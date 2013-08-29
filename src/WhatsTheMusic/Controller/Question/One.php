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

        session_start();
        $_SESSION['quiz']['olderQuestions'][] = array_shift($_SESSION['quiz']['questions']);
        

        $answers = $this->em->getRepository('WhatsTheMusic\Entity\Answer')
            ->getRandomic(3, $question->getCorrectAnswer()->getId());
        $correctAnswer = $question->getCorrectAnswer();
        array_push($answers, $correctAnswer);
        shuffle($answers);

        return array(
            '_view' => 'question/single.html',
            'question' => $question,
            'answers' => $answers,
            'quiz' => $quiz
        );
    }
}