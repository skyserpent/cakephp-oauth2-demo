<?php


class AuthorizeController extends AppController
{
    public function beforeFilter()
    {
    	// Setup the server
    	$this->app = $this->Server->setup();
    }

    /**
     * The user is directed here by the client in order to authorize the client app
     * to access his/her data
     */
    public function authorize()
    {
    	// Handle requests
    	if ($this->request->is('post')) {
    		$this->layout = 'ajax';
    		$this->authorizeFormSubmit();
    	} else if ($this->request->is('get')) {
			// Define the server, request, and response variables retrieved from the Server object
			$server = $this->app['oauth_server'];
			$request = $this->app['oauth_request'];
			$response = $this->app['oauth_response'];
			
	        // validate the authorize request. if it is invalid, redirect back to the client with the errors in tow
	        if (!$server->validateAuthorizeRequest($request, $response)) {
	        	$response->send();
	        	die;
	        }
	
	        $query = $this->app['oauth_request']->query;
	        
	        $this->set('client_id', ($query['client_id']));
	        $this->set('response_type', ($query['response_type']));
	        $this->set('query', $query);
	        $this->render('/Server/authorize');
    	} else {
    		// add throw exception
    	}
    }

    /**
     * This is called once the user decides to authorize or cancel the client app's
     * authorization request
     */
    public function authorizeFormSubmit()
    {
        // get the oauth server (configured in src/OAuth2Demo/Server/Server.php)
        $server = $this->app['oauth_server'];

         // get the oauth response (configured in src/OAuth2Demo/Server/Server.php)
        $response = $this->app['oauth_response'];
        $request = $this->app['oauth_request'];
        
        // check the form data to see if the user authorized the request
        $authorized = (bool) $request->request['authorize'];

        // call the oauth server and return the response
        $response = $server->handleAuthorizeRequest($this->app['oauth_request'], $response, $authorized);
        return $this->redirect($response->getHttpHeader('Location'));
    }
}