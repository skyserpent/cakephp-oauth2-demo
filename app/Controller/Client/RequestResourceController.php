<?php
App::uses('HttpSocket', 'Network/Http');

class RequestResourceController extends AppController {
	public function beforeFilter() {
// 		$this->Auth->allow();
		$this->HttpSocket = new HttpSocket();
		$this->app = $this->Server->setup();
		$this->config = $this->Client->setup();
	}
	
	public function requestResource()
	{
		$request = $this->app['oauth_request'];
		// pull the token from the request
		$token = $request->query('token');
	
		// make the resource request with the token in the request body
		$this->config['resource_params']['access_token'] = $token;
	
		// determine the resource endpoint to call based on our config (do this somewhere else?)
		$apiRoute = $this->config['resource_route'];
// 		$endpoint = 0 === strpos($apiRoute, 'http') ? $apiRoute : $urlgen->generate($apiRoute, $config['resource_params'], true);
		$endpoint = 'http://localhost/oauthapp/server/resource' . '?' . http_build_query($this->config['resource_params']);
	
		// make the resource request and decode the json response
		$request = $this->HttpSocket->get($endpoint, null, $this->config['http_options']);
		$this->set('access_token', $token);
		
		$json = json_decode((string) $request->body, true);
	
		$resource_uri = sprintf('%s%saccess_token=%s', $endpoint, false === strpos($endpoint, '?') ? '?' : '&', $token);
		
		$this->set('token', $token);
		$this->set('response', $json);
		$this->set('resource_uri', $resource_uri);
		$this->render('/client/show_resource');
	}
}