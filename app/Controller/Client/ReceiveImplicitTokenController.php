<?php

class ReceiveImplicitTokenController extends AppController {
	public function beforeFilter() {
// 		$this->Auth->allow();
		$this->app = $this->Server->setup();
	}
	
	public function receiveImplicitToken()
	{
		// nothing to do - implicit tokens are in the URL Fragment, so it must be done by the browser
		$request = $this->app['oauth_request'];
		// pull the token from the request
		$token = $request->query('token');
		$this->set('token', $token);
		$this->render('/client/show_implicit_token');
	}
}