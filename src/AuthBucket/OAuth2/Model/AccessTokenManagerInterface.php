<?php

/**
 * This file is part of the authbucket/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\OAuth2\Model;

/**
 * OAuth2 access token manager interface.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
interface AccessTokenManagerInterface extends ModelManagerInterface
{
    public function createAccessToken();

    public function deleteAccessToken(AccessTokenInterface $access_token);

    public function reloadAccessToken(AccessTokenInterface $access_token);

    public function updateAccessToken(AccessTokenInterface $access_token);

    public function findAccessTokenByAccessToken($access_token);
}
