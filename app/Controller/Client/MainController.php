<?php

class MainController extends AppController {
	public function beforeFilter() {
		$this->Auth->allow();
		$this->config = $this->Client->setup();
	}
	
	public function index() {
		// render the homepage
// 		if (!$app['session']->isStarted()) {
// 			$app['session']->start();
// 		}
// 		debug($this->config);
		$this->set('config', $this->config);
		$this->render('../index');
	}
}