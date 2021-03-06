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
 * OAuth2 authorization code manager interface.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
interface CodeManagerInterface extends ModelManagerInterface
{
    public function createCode();

    public function deleteCode(Codeinterface $code);

    public function reloadCode(Codeinterface $code);

    public function updateCode(Codeinterface $code);

    public function findCodeByCode($code);
}
