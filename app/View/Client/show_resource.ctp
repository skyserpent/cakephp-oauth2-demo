    <?php echo $this->element('links'); ?>    
    
    <div style="width:600px;margin:auto;">
    <h3>Resource Request Complete!</h3>
    <?php 
    	if ($response['friends']) {
    ?>
        <p>
            You have successfully called the APIs with your Access Token.  Here are your friends:
        </p>

        <ul>
            <?php foreach($response['friends'] as &$friend) { ?>
                <li><?php echo $friend ?></li>
            <?php } ?>
        </ul>

        <p>Here is the full JSON response: </p>

        <pre><?php echo json_encode($response, JSON_PRETTY_PRINT); ?></pre>
    <?php
    	} else {
    ?>
        <h4>Response:</h4>
        <?php include '_error.ctp' ?>
	<?php
    	}
    ?>
    
    <pre><code>  The API call can be seen at <a href="http://localhost/oauthapp/server/resource?access_token=<?php echo $token; ?>" target="_blank">http://localhost/oauthapp/server/resource</a></code></pre>

    <div class="text-center"><a href="http://localhost/oauthapp/">Go to Home</a></div>
    </div>
