<?php

namespace Socialgeo\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;


class Controller extends BaseController
{
    protected function getSecurityContext()
    {
        /**
         * @return \Symfony\Component\Security\Core\SecurityContext
         */
        return $this->container->get('security.context');
    }

    /**
     * @return \Socialgeo\UserBundle\Entity\User
     */
    public function getUser()
    {
        return parent::getUser();
    }
}