<?php

namespace WhatsTheMusic\Controller\Quiz;

use WhatsTheMusic\Controller\AbstractController;

/**
* Finish Quiz Controller
*/
class Finish extends AbstractController
{
    public function get($quizId)
    {
        $quiz = $this->em->getRepository('WhatsTheMusic\Entity\Quiz')->find($quizId);

        if (!$quiz) {
            throw new \Exception("quiz not found", 404);
        }

        if (count($quiz->getQuestions()) == 0) {
            throw new \Exception("quiz don't have any question", 404);
        }

        session_start();

        if (empty($_SESSION['quiz'])) {
            header("Location: /quiz/{$quizId}/play");
        }

        $questions = $quiz->getQuestions();
        $arrPlaylist = array();
        foreach ($questions as $question) {
            $arrPlaylist[] = $question->getCorrectAnswer()->getMusic();
        }
        $playlist = join(',', $arrPlaylist);

        return array(
            '_view' => 'quiz/finish.html', 
            'quizId' => $quizId,
            'isHighest' => $quiz->getMaxPoints() < $_SESSION['quiz']['rightAnswers'],
            'playlist' =>  $playlist
        );
    }
}