<?php

namespace WhatsTheMusic\Controller;

/**
* Home Controller
*/
class HomeController extends AbstractController
{
	
	public function get()
	{
		$quizzes = $this->em->getRepository('WhatsTheMusic\Entity\Quiz')->getAll(6);
		return array(
			'_view' => 'index.html',
			'quizzes' => $quizzes
		);
	}
}