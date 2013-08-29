<?php

namespace WhatsTheMusic\Controller\Quiz;

use WhatsTheMusic\Controller\AbstractController;

class All extends AbstractController
{
    public function get()
    {
        $limit = filter_input(INPUT_GET, 'limit');
        $limit = $limit ?: 6;

        $quizzes = $this->em->getRepository('WhatsTheMusic\Entity\Quiz')->getAll($limit);

        return array(
            '_view' => 'quiz/all.html',
            'quizzes' => $quizzes
        );
    }
}