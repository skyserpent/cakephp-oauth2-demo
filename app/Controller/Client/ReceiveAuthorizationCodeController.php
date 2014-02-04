<?php

class ReceiveAuthorizationCodeController extends AppController {
	public function beforeFilter() {
		$this->Auth->allow();
		$this->app = $this->Server->setup();
	}
	
	public function receiveAuthorizationCode()
	{
		$request = $this->app['oauth_request']; // the request object

		// the user denied the authorization request
		if (!$code = $_GET['code']) {
			$this->set('response', $request->getAllQueryParameters());
			$this->render('/client/failed_authorization');
		}
		
		// verify the "state" parameter matches this user's session (this is like CSRF - very important!!)
		if ($request->query('state') !== $session->getId()) {
			$this->set('response', array('error_description' => 'Your session has expired.  Please try again.'));
			$this->render('/client/failed_authorization');
		}
		
		$this->set('code', $code);
		$this->render('/client/show_authorization_code');
	}
}