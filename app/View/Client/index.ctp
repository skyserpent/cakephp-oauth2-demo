    <?php echo $this->element('links'); ?>
    
    
    <h3 class="text-center">CakePHP OAuth2.0 Demo Application</h3>
    
    <p class="text-center">
        Welcome to the CakePHP OAuth2.0 Demo Application!  This is an application that demos some of the basic OAuth2.0 Workflows.
    </p>

    <div style="width:700px;margin:0 auto;">
        <ul class="nav nav-tabs">
            <li><a href="#authcode" data-toggle="tab">Authorization Code</a></li>
            <li><a href="#implicit" data-toggle="tab">Implicit</a></li>
            <li><a href="#usercred" data-toggle="tab">User Credentials</a></li>
        </ul>
	    <div class="tab-content">
	        <div class="tab-pane active" id="authcode"><?php include APP . 'View' . DS . 'client' . DS . 'grant_types' . DS . '_authorization_code.ctp' ?></div>
	        <div class="tab-pane" id="implicit"><?php include APP . 'View' . DS . 'client' . DS . 'grant_types' . DS . '_implicit.ctp' ?></div>
	        <div class="tab-pane" id="usercred"><?php include APP . 'View' . DS . 'client' . DS . 'grant_types' . DS . '_user_credentials.ctp' ?></div>
	    </div>
    </div>
