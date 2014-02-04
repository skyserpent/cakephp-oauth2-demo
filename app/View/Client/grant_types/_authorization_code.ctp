<br>

<p>
    The <code>Authorization Code</code> grant type is the most common workflow for OAuth2.0.  Clicking the "Authorize" button below will send you to an OAuth2.0 Server to authorize:
</p>

<a class="btn btn-primary" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/oauthapp/server/authorize?response_type=code&client_id=<?php echo $config['client_id']; ?>&redirect_uri=<?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/oauthapp/client/receive_authcode&state={{session_id}}">Authorize</a>