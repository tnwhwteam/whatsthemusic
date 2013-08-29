<?php

namespace WhatsTheMusic\Controller\Question;

use WhatsTheMusic\Controller\AbstractController;

/**
* Controller to validate Answer for Quiz
*/
class Validate extends AbstractController
{
	public function get($question, $answer)
	{
		$question = $this->em->getRepository('WhatsTheMusic\Entity\Question')->find($question);
        $correctAnswer = $question->getCorrectAnswer();

        $right = ($correctAnswer->getId() == $answer);

        if ($right === true) {
            $_SESSION['quiz']['rightAnswers'] += 1;
        }

        return array(
            '_view' => 'question/validate.html', 
            'isCorrect' =>  $right,
            'answer' => $correctAnswer
        );
	}
}