AuthBucket\\OAuth2
==================

[![Build
Status](https://travis-ci.org/authbucket/oauth2.svg?branch=master)](https://travis-ci.org/authbucket/oauth2)
[![Coverage
Status](https://img.shields.io/coveralls/authbucket/oauth2.svg)](https://coveralls.io/r/authbucket/oauth2?branch=master)
[![Dependency
Status](https://www.versioneye.com/php/authbucket:oauth2/dev-master/badge.svg)](https://www.versioneye.com/php/authbucket:oauth2/dev-master)
[![Latest Stable
Version](https://poser.pugx.org/authbucket/oauth2/v/stable.png)](https://packagist.org/packages/authbucket/oauth2)
[![Total
Downloads](https://poser.pugx.org/authbucket/oauth2/downloads.png)](https://packagist.org/packages/authbucket/oauth2)
[![License](https://poser.pugx.org/authbucket/oauth2/license.png)](https://packagist.org/packages/authbucket/oauth2)

The primary goal of
[AuthBucket\\OAuth2](https://github.com/authbucket/oauth2) is to develop
a standards compliant [RFC6749
OAuth2.0](http://tools.ietf.org/html/rfc6749) library; secondary goal
would be develop corresponding wrapper [Symfony2
Bundle](http://www.symfony.com) and [Drupal module](http://drupal.org).

Installation
------------

This library is provided as a [Composer
package](https://packagist.org/packages/authbucket/oauth2) which can be
installed by adding the package to your `composer.json`:

    {
      "require": {
        "authbucket/oauth2": "1.0.*@dev"
      }
    }

Demo Application
----------------

This library bundle with a [Silex](https://github.com/silexphp/Silex)
based demo application that can access from
<http://demo.oauth2.authbucket.com/>.

You may also run the demo locally. Open a console and execute the
following command to install the latest version in the oauth2/
directory:

    $ composer create-project authbucket/oauth2 oauth2/ dev-master

Then use the PHP built-in web server to run the demo application:

    $ cd oauth2/
    $ php app/console server:run

If you get the error
`There are no commands defined in the "server" namespace.`, then you are
probably using PHP 5.3. That's ok! But the built-in web server is only
available for PHP 5.4.0 or higher. If you have an older version of PHP
or if you prefer a traditional web server such as Apache or Nginx, read
the [Configuring a web
server](http://silex.sensiolabs.org/doc/web_servers.html)
article.

Open your browser and access the <http://localhost:8000> URL to see the
Welcome page of demo application.

Documentation
-------------

OAuth2's documentation is built with
[Sami](https://github.com/fabpot/Sami) and publicly hosted on GitHub
Pages at http://authbucket.github.io/oauth2. The documents may also
built locally.

To built the documents locally, execute the following command:

    $ vendor/bin/sami.php update app/config/sami.php

Open `build/oauth2/index.html` with your browser for the documents.

Tests
-----

This project is coverage with [PHPUnit](http://phpunit.de/) test cases,
where CI result can be found from
<https://travis-ci.org/authbucket/oauth2>.

Code coverage CI result can be found from
<https://coveralls.io/r/authbucket/oauth2>.

To run the test suite, execute the following command:

    $ vendor/bin/phpunit

Open `build/logs/html` with your browser for the coverage report.

References
----------

-   http://authbucket.github.io/oauth2/
-   http://oauth2.demo.authbucket.com/
-   https://coveralls.io/r/authbucket/oauth2
-   https://github.com/authbucket/oauth2
-   https://packagist.org/packages/authbucket/oauth2
-   https://travis-ci.org/authbucket/oauth2

License
-------

-   The library is licensed under the [MIT
    License](http://opensource.org/licenses/MIT)

