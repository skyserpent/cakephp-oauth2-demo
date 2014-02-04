    <?php echo $this->element('links'); ?>    
    
    <h3 class="text-center">Token Retrieved!</h3>
    <pre class="text-center"><code>  Access Token: <?php echo $token ?>  </code></pre>

    <p class="text-center">
        Now use this token to make a request to the OAuth2.0 Server's APIs:
    </p>

    <div class="text-center"><a class="btn btn-primary" href="http://localhost/oauthapp/client/request_resource?token=<?php echo $token; ?>">make a resource request</a></div>
	<br>
    <div class="help text-center"><em>This token can now be used multiple times to make API requests for this user.</em></div>
