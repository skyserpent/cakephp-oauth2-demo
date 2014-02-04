<?php
App::uses('Component', 'Controller');

class ClientComponent extends Component
{
    /**
     * function to set up the container for the Client app
     */
    public function setup()
    {
        return $this->loadParameters();
    }
    
    /**
     * Load the parameters configuration
     */
    private function loadParameters()
    {
        $parameterFile = APP . 'Lib' . DS . 'Data' . DS . 'parameters.json';
        if (!file_exists($parameterFile)) {
            // allows you to customize parameter file
            $parameterFile = $parameterFile.'.dist';
        }
        $app['environments'] = array();
        if (!$parameters = json_decode(file_get_contents($parameterFile), true)) {
            throw new \Exception('unable to parse parameters file: '.$parameterFile);
        }
        // we are using an array of configurations
        if (!isset($parameters['client_id'])) {
            $app['environments'] = array_keys($parameters);
            $env = $app['session']->get('config_environment');
            $parameters = isset($parameters[$env]) ? $parameters[$env] : array_shift($parameters);
        }
//         $app['parameters'] = $parameters;
		return $parameters;
    }
}
