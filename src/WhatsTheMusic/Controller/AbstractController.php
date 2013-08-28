<?php

namespace WhatsTheMusic\Controller;

use Doctrine\ORM\EntityManager;
use Respect\Config\Container;
use Respect\Rest\Routable;

/**
* Abstract Controller
*/
class AbstractController implements Routable
{
    protected $em;

    public function __construct(EntityManager $em = null)
    {
        if (is_null($em)) {
            $c = new Container(CONFIG_DIR . '/config.ini');
            $em = $c->entityManager;
        }
        $this->em = $em;
    }
}
