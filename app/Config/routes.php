<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'main', 'action' => 'index', 'home'));
	Router::connect('/client', array('controller' => 'client', 'action' => 'index'));
	Router::connect('/client/receive_authcode', array('controller' => 'ReceiveAuthorizationCode', 'action' => 'receiveAuthorizationCode'));
	Router::connect('/client/request_token/authorization_code', array('controller' => 'RequestToken', 'action' => 'requestTokenWithAuthCode'));
	Router::connect('/client/request_token/user_credentials', array('controller' => 'RequestToken', 'action' => 'requestTokenWithUserCredentials'));
	Router::connect('/client/receive_implicit_token', array('controller' => 'ReceiveImplicitToken', 'action' => 'receiveImplicitToken'));
	Router::connect('/client/request_resource', array('controller' => 'RequestResource', 'action' => 'requestResource'));
	Router::connect('/server/authorize/*', array('controller' => 'Authorize', 'action' => 'authorize'));
	Router::connect('/server/resource', array('controller' => 'Resource', 'action' => 'resource'));
	Router::connect('/server/token', array('controller' => 'Token', 'action' => 'token'));
	


/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
