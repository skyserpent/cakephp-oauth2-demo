<br>

<p>
    The <code>User Credentials</code> grant type is a Two-Legged approach that allows you to
    obtain an <code>Access Token</code> in exchange for a set of end-user credentials.
</p>

<p>
    The OAuth2 Server supports the following user credentials:
</p>

<ul>
    <li><strong>Username</strong>: <?php echo $config['user_credentials'][0]; ?></li>
    <li><strong>Password</strong>: <?php echo $config['user_credentials'][1]; ?></li>
</ul>

<p>Make the following cURL request to receive an access token:</p>

<pre><code>  $ curl -v "<?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/oauthapp/server/token" \
    -d "grant_type=password&client_id=<?php echo $config['client_id']; ?>&client_secret=<?php echo $config['client_secret']; ?>&username=<?php echo $config['user_credentials'][0]; ?>&password=<?php echo $config['user_credentials'][1]; ?>"
</code></pre>

<p>...or just click below to let us do it for you<p>

<a class="btn btn-primary" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/oauthapp/client/request_token/user_credentials' ?>?username=<?php echo $config['user_credentials'][0]; ?>&password=<?php echo $config['user_credentials'][1]; ?>">Get Access Token</a>
