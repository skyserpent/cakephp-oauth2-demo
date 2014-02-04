<?php
App::uses('HttpSocket', 'Network/Http');

class RequestTokenController extends AppController {

	public function beforeFilter() {
// 		$this->Auth->allow();
		$this->HttpSocket = new HttpSocket();
		$this->app = $this->Server->setup();
		$this->config = $this->Client->setup();
	}
	
	public function requestTokenWithAuthCode()
	{
		$request = $this->app['oauth_request'];
		$code = $request->query['code'];
	
		// exchange authorization code for access token
		$query = array(
			'grant_type'    => 'authorization_code',
			'code'          => $code,
			'client_id'     => $this->config['client_id'],
			'client_secret' => $this->config['client_secret'],
			'redirect_uri'  => 'http://localhost/oauthapp/client/receive_authcode',
		);
	
		// make the token request via http and decode the json response
		$response = $this->HttpSocket->post('http://localhost/oauthapp/server/token', $query, $this->config['http_options']);
		$json = json_decode((string) $response->body, true);

		// if it is succesful, display the token in our app
		if (isset($json['access_token'])) {
			$this->set('token', $json['access_token']);
			$this->render('/client/show_access_token');
		} else {
			$this->set('response', $json ? $json : $response);
			$this->render('/client/failed_token_request');
		}
	}
	
	public function requestTokenWithUserCredentials()
	{

		$username = $this->app['oauth_request']->query['username'];
		$password = $this->app['oauth_request']->query['password'];
	
		// exchange user credentials for access token
		$query = array(
			'grant_type'    => 'password',
			'client_id'     => $this->config['client_id'],
			'client_secret' => $this->config['client_secret'],
			'username'      => $username,
			'password'      => $password
		);
		
		// determine the token endpoint to call based on our config (do this somewhere else?)
		$grantRoute = $this->config['token_route'];
// 		$endpoint = 0 === strpos($grantRoute, 'http') ? $grantRoute : $urlgen->generate($grantRoute, array(), true);
		
		// make the token request via http and decode the json response
		$response = $this->HttpSocket->post('http://localhost/oauthapp/server/token', $query, $this->config['http_options']);
		
		
		// GET THE TOKEN RESPONSE - FOR DEVELOPMENT PURPOSES
		echo $response;
		
		
		$json = json_decode((string) $response->body, true);
	
		// if it is succesful, display the token in our app
		if (isset($json['access_token'])) {
			$this->set('token', $json['access_token']);
			$this->render('/client/show_access_token');
		} else {
			$this->set('response', $json ? $json : $response);
			$this->render('/client/failed_token_request');
		}
		
	}
}