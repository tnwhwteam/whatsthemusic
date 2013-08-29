<?php

namespace WhatsTheMusic\Controller\Question\Validate;

use WhatsTheMusic\Controller\AbrstractController;

/**
* Controller to validate Answer for Quiz
*/
class Validate extends AbrstractController
{
	public function get($question, $answer)
	{
		$question = $this->em->getRepository('WhatsTheMusic\Entity\Answer')
			->find($question);
		
	}
}