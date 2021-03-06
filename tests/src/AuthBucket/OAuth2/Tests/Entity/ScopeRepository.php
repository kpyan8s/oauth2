<?php

/**
 * This file is part of the authbucket/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\OAuth2\Tests\Entity;

use Doctrine\ORM\EntityRepository;
use AuthBucket\OAuth2\Model\ScopeInterface;
use AuthBucket\OAuth2\Model\ScopeManagerInterface;

/**
 * ScopeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ScopeRepository extends EntityRepository implements ScopeManagerInterface
{
    public function getClass()
    {
        return $this->getClassName();
    }

    public function createScope()
    {
        $class = $this->getClass();

        return new $class();
    }

    public function deleteScope(ScopeInterface $scope)
    {
        $this->getEntityManager()->remove($scope);
        $this->getEntityManager()->flush();
    }

    public function reloadScope(ScopeInterface $scope)
    {
        $this->getEntityManager()->refresh($scope);
    }

    public function updateScope(ScopeInterface $scope)
    {
        $this->getEntityManager()->persist($scope);
        $this->getEntityManager()->flush();
    }

    public function findScopes()
    {
        return $this->findAll();
    }
}
