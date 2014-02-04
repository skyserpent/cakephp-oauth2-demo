<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class TokenController extends AppController
{
    public function beforeFilter() {
    	$this->Auth->allow();
    	$this->loadModel('User');
		$this->app = $this->Server->setup();
	}
	
    /**
     * This is called by the client app once the client has obtained
     * an authorization code from the Authorize Controller (@see Controllers\Server\AuthorizeController).
     * If the request is valid, an access token will be returned
     */
    public function token()
    {
        // get the oauth server (configured in src/OAuth2Demo/Server/Server.php)
        $server = $this->app['oauth_server'];
        // get the oauth response (configured in src/OAuth2Demo/Server/Server.php)
        $response = $this->app['oauth_response'];
        // get the oauth request (configured in src/OAuth2Demo/Server/Server.php)
        $request = $this->app['oauth_request'];
        
        if($this->request->is('post')) {
        	$this->layout = 'ajax';
        	$this->render(false);
        	
        	$username = $this->request->data['username'];
        	$password = $this->request->data['password'];
        	
//         	// Take the password and use hashing to match against database?
//         	$passwordHasher = new SimplePasswordHasher();
//         	$password = $passwordHasher->hash($password);
        	
//         	// Replace the existing pass with the hashed version?
//         	$request->request['password'] = $password;
        	
        	// let the oauth2-server-php library do all the work!
        	$server->handleTokenRequest($request, $response)->send();
			
        	////////////////////////
        	////// DEBUG HERE //////
			////////////////////////
// 			debug($request->request['password']);
        } else if($this->request->is('get')) {
        	// 404
        }
    }
}