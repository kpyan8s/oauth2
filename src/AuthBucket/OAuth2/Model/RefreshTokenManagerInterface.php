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
 * OAuth2 refresh token manager interface.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
interface RefreshTokenManagerInterface extends ModelManagerInterface
{
    public function createRefreshToken();

    public function deleteRefreshToken(RefreshTokenInterface $refresh_token);

    public function reloadRefreshToken(RefreshTokenInterface $refresh_token);

    public function updateRefreshToken(RefreshTokenInterface $refresh_token);

    public function findRefreshTokenByRefreshToken($refresh_token);
}
