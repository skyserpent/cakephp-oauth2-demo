<?php
App::uses('Component', 'Controller');

class ServerComponent extends Component
{
    /**
     * function to create the OAuth2 Server Object
     */
    public static function setup()
    {
        $dsn      = 'mysql:dbname=oauth;host=localhost';
        $username = 'root';
        $password = '';

        // error reporting (this is a demo, after all!)
        ini_set('display_errors',1);error_reporting(E_ALL);

        // Autoloading (composer is preferred, but for this example let's just do this)
        require_once (APP . 'Vendor' . DS . 'oauth2-server-php' . DS . 'src' . DS . 'OAuth2' . DS . 'Autoloader.php');
        OAuth2\Autoloader::register();

        // $dsn is the Data Source Name for your database, for exmaple "mysql:dbname=my_oauth2_db;host=localhost"
        $storage = new OAuth2\Storage\Pdo(array('dsn' => $dsn, 'username' => $username, 'password' => $password));

        // create array of supported grant types
        $grantTypes = array(
            'authorization_code' => new OAuth2\GrantType\AuthorizationCode($storage),
            'user_credentials'   => new OAuth2\GrantType\UserCredentials($storage),
        );

        // instantiate the oauth server
        $server = new OAuth2\Server($storage, array('enforce_state' => true, 'allow_implicit' => true), $grantTypes);

        // add the server to the silex "container" so we can use it in our controllers (see src/OAuth2Demo/Server/Controllers/.*)
        $app['oauth_server'] = $server;
        $app['oauth_request'] = OAuth2\Request::createFromGlobals();
        $app['oauth_response'] = new OAuth2\Response();

        return $app;
    }

    /**
     * Connect the controller classes to the routes
     */
    public function connect()
    {
        // create the oauth2 server object
        $this->setup();

        // creates a new controller based on the default route
        $routing = $app['controllers_factory'];

        /* Set corresponding endpoints on the controller classes */
        Controllers\Authorize::addRoutes($routing);
        Controllers\Token::addRoutes($routing);
        Controllers\Resource::addRoutes($routing);

        return $routing;
    }

    private function generateSqliteDb()
    {
        include_once(__DIR__.'/../../../data/rebuild_db.php');
    }
}