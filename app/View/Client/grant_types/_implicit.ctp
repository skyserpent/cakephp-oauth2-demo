<br>

<p>
    The <code>Implicit</code> grant type is very similar to the <code>Authorization Code</code> grant type,
    except that the <code>Access Token</code> is returned as part of the URL fragment instead of an API
    request to the OAuth2.0 Server. Clicking the "Authorize" button below will send you to an
    OAuth2.0 Server to authorize:
</p>
<a class="btn btn-primary" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/oauthapp/server/authorize?response_type=token&client_id=<?php echo $config['client_id']; ?>&redirect_uri=<?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/oauthapp/client/receive_implicit_token&state={{ session_id }}">Authorize</a>
