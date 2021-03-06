<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wise\OwnerBundle\Provider;

use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class CustomerProvider implements UserProviderInterface
{

    private $userManager;

    public function __construct($userManager)
    {
        $this->userManager = $userManager;
    }

    public function loadUserByUsername($username)
    {
        $ownerRepo = $this->userManager->getRepository("wiseOwnerBundle:Proprietaire");

        $user = $ownerRepo->findOneBy(array('username' => $username));

        dump('sonde load customer provider', $user);
        return $user;
    }

    public function refreshUser(SecurityUserInterface $user)
    {
        dump('sonde refresh customer provider');
        return $user;
    }

    public function supportsClass($class)
    {

    }

    public function __toString()
    {
        return "toString du provider";
    }
}
