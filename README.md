cakephp-oauth2-demo
===================

A demo for an application running OAuth2 server.

NOTICE
======
Project is not maintained any longer. Feel welcome to fork and continue development. 

An early stage project. Make sure you specifically set up your app in "http://localhost/oauthapp" directory. As of right now,
I am trying to get the user credentials to work in conjunction with CakePHP's system. Once that's complete, I will refactor the code
design.

INSTALLATION
============

1. Use [Composer](http://getcomposer.org/) to install this application:

    $ git clone git://github.com/skyserpent/cakephp-oauth2-demo.git
    $ cd oauth2-demo-php
    $ curl -s http://getcomposer.org/installer | php
    $ ./composer.phar install

2. Setup your db - https://gist.github.com/skyserpent/8799315

3. Add a user by going to "http://localhost/oauthapp/users/add"

4. Direct your browser to "http://localhost/oauthapp" to visit the main page.
