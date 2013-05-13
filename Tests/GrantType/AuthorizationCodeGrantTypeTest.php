<?php

/**
 * This file is part of the pantarei/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\OAuth2\Tests\GrantType;

use Pantarei\OAuth2\Database\Database;
use Pantarei\OAuth2\Tests\OAuth2WebTestCase;
use Pantarei\OAuth2\GrantType\AuthorizationCodeGrantType;

/**
 * Test authorization code grant type functionality.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
class AuthorizationCodeGrantTypeTest extends OAuth2WebTestCase
{
  public function testGrantType()
  {
    $query = array(
      'grant_type' => 'authorization_code',
      'code' => 'f0c68d250bcc729eb780a235371a9a55',
      'redirect_uri' => 'http://democlient2.com/redirect_uri',
      'client_id' => 'http://democlient2.com/',
    );
    $grant_type = new AuthorizationCodeGrantType($query, $query);
    $this->assertEquals('authorization_code', $grant_type->getGrantType());

    $grant_type->setCode('83f1d26e90c2a275ae752adc6e49aa43');
    $this->assertEquals('83f1d26e90c2a275ae752adc6e49aa43', $grant_type->getCode());

    $grant_type->setRedirectUri('http://democlient3.com/redirect_uri');
    $this->assertEquals('http://democlient3.com/redirect_uri', $grant_type->getRedirectUri());

    $grant_type->setClientId('http://democlient3.com/');
    $this->assertEquals('http://democlient3.com/', $grant_type->getClientId());
  }

  /**
   * @expectedException \Pantarei\OAuth2\Exception\InvalidRequestException
   */
  public function testNoCode() {
    $query = array(
      'grant_type' => 'authorization_code',
      'redirect_uri' => 'http://democlient2.com/redirect_uri',
      'client_id' => 'http://democlient2.com/',
    );
    $grant_type = new AuthorizationCodeGrantType($query, $query);
    // This won't happened!!
    $this->assertEquals('authorization_code', $grant_type->getGrantType());
  }

  /**
   * @expectedException \Pantarei\OAuth2\Exception\InvalidGrantException
   */
  public function testBadCode() {
    $query = array(
      'grant_type' => 'authorization_code',
      'code' => '83f1d26e90c2a275ae752adc6e49aa43',
      'redirect_uri' => 'http://democlient2.com/redirect_uri',
      'client_id' => 'http://democlient2.com/',
    );
    $grant_type = new AuthorizationCodeGrantType($query, $query);
    // This won't happened!!
    $this->assertEquals('authorization_code', $grant_type->getGrantType());
  }

  /**
   * @expectedException \Pantarei\OAuth2\Exception\InvalidRequestException
   */
  public function testExpiredCode() {
    $data = new \Pantarei\OAuth2\Tests\Entity\Codes();
    $data->setCode('5ddaa68ac1805e728563dd7915441408')
      ->setClientId('http://democlient1.com/')
      ->setRedirectUri('http://democlient1.com/redirect_uri')
      ->setExpires(time() - 3600)
      ->setUsername('demousername4')
      ->setScope(array(
        'demoscope1',
      ));
    Database::persist($data);

    $query = array(
      'grant_type' => 'authorization_code',
      'code' => '5ddaa68ac1805e728563dd7915441408',
      'redirect_uri' => 'http://democlient1.com/redirect_uri',
      'client_id' => 'http://democlient1.com/',
    );
    $grant_type = new AuthorizationCodeGrantType($query, $query);
    // This won't happened!!
    $this->assertEquals('authorization_code', $grant_type->getGrantType());
  }
}
