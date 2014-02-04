<?php


class ResourceController extends AppController
{
    // Connects the routes in Silex
//     static public function addRoutes($routing)
//     {
//         $routing->get('/resource', array(new self(), 'resource'))->bind('access');
//     }
	public function beforeFilter() {
		$this->app = $this->Server->setup();
		
		$this->layout = 'ajax';
		$this->render(false);
	}
	
    /**
     * This is called by the client app once the client has obtained an access
     * token for the current user.  If the token is valid, the resource (in this
     * case, the "friends" of the current user) will be returned to the client
     */
    public function resource()
    {
        // get the oauth server (configured in src/OAuth2Demo/Server/Server.php)
        $server = $this->app['oauth_server'];
        // get the request
        $request = $this->app['oauth_request'];
        // get the oauth response (configured in src/OAuth2Demo/Server/Server.php)
        $response = $this->app['oauth_response'];
        
		if (!$server->verifyResourceRequest($request, $response)) {
//             debug($server->getResponse());
			$server->getResponse()->send();
    		die;
        } else {
            // return a fake API response - not that exciting
            // @TODO return something more valuable, like the name of the logged in user
            $api_response = array(
                'friends' => array(
                    'john',
                    'matt',
                    'jane'
                )
            );
//             return new Response(json_encode($api_response));
            echo json_encode($api_response);
        }
    }
}