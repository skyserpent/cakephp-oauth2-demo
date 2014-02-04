<?php
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class OAuthAuthenticate extends BaseAuthenticate {
	public function authenticate(CakeRequest $request, CakeResponse $response) {
		// Do things for OpenID here.
		// Return an array of user if they could authenticate the user,
		// return false if not
	}
}