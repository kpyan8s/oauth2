<?php

/**
 * This file is part of the authbucket/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require __DIR__ . '/config.php';

$app['db.options'] = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/../cache/prod/.ht.sqlite',
);
