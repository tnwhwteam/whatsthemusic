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

        return array(
            '_view' => 'question/validate.html', 
            'isCorrect' =>  $correctAnswer->getId() == $answer,
            'answer' => $correctAnswer
        );
	}
}