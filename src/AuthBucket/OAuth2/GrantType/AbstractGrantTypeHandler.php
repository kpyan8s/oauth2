<?php

/**
 * This file is part of the authbucket/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\OAuth2\GrantType;

use AuthBucket\OAuth2\Exception\InvalidRequestException;
use AuthBucket\OAuth2\Exception\InvalidScopeException;
use AuthBucket\OAuth2\Model\ModelManagerFactoryInterface;
use AuthBucket\OAuth2\Security\Authentication\Token\ClientToken;
use AuthBucket\OAuth2\Util\Filter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Shared grant type implementation.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
abstract class AbstractGrantTypeHandler implements GrantTypeHandlerInterface
{
    /**
     * Fetch client_id from authenticated token.
     *
     * @param SecurityContextInterface $securityContext
     *                                                  Incoming request object.
     *
     * @return string
     *                Supplied client_id from authenticated token.
     *
     * @throw ServerErrorException
     *   If supplied token is not a ClientToken instance.
     */
    protected function checkClientId(
        SecurityContextInterface $securityContext
    )
    {
        $client_id = $securityContext->getToken()->getClientId();

        return $client_id;
    }

    /**
     * Fetch scope from POST.
     *
     * @param Request                      $request
     *                                                          Incoming request object.
     * @param ModelManagerFactoryInterface $modelManagerFactory
     *                                                          Model manager factory for compare with database record.
     *
     * @return array|null
     *                    Supplied scope in array from incoming request, or null if none given.
     *
     * @throw InvalidRequestException
     *   If supplied scope in bad format.
     * @throw InvalidScopeException
     *   If supplied scope outside supported scope range.
     */
    protected function checkScope(
        Request $request,
        ModelManagerFactoryInterface $modelManagerFactory,
        $client_id,
        $username
    )
    {
        $scope = $request->request->get('scope', null);

        // scope may not exists.
        if ($scope) {
            // scope must be in valid format.
            $query = array(
                'scope' => $scope,
            );
            if (!Filter::filter($query)) {
                throw new InvalidRequestException();
            }

            // Compare if given scope within all available authorized scopes.
            $authorized_scope = array();
            $authorizeManager = $modelManagerFactory->getModelManager('authorize');
            $result = $authorizeManager->findAuthorizeByClientIdAndUsername($client_id, $username);
            if ($result !== null) {
                $authorized_scope = $result->getScope();
            }

            $supported_scope = array();
            $scopeManager = $modelManagerFactory->getModelManager('scope');
            $result = $scopeManager->findScopes();
            if ($result !== null) {
                foreach ($result as $row) {
                    $supported_scope[] = $row->getScope();
                }
            }

            $scope = preg_split('/\s+/', $scope);
            if (array_intersect($scope, $authorized_scope, $supported_scope) != $scope) {
                throw new InvalidScopeException();
            }
        }

        return $scope;
    }
}
