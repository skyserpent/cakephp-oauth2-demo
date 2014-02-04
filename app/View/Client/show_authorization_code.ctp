    <?php echo $this->element('links'); ?>    
    
    <h3 class="text-center">Authorization Code Retrieved!</h3>
    <p class="text-center">We have been given an <strong>Authorization Code</strong> from the OAuth2.0 Server:</p>
    <pre class="text-center"><code>  Authorization Code: <?php echo $code ?>  </code></pre>

    <p class="text-center">
        Now exchange the Authorization Code for an <strong>Access Token</strong>:
    <p>

    <a class="col-md-2 col-md-offset-5 btn btn-primary" href="http://localhost/oauthapp/client/request_token/authorization_code?code=<?php echo $code ?>">make a token request</a>
	<br><br>
    <div class="text-center help"><em>usually this is done behind the scenes, but we're going step-by-step so you don't miss anything!</em></div>



