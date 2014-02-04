<p>
    <?php 
    	if (isset($response['error_description'])) {
	    	echo '<div class="text-center">' . $response['error_description'] . '</div>';
	    	if (isset($response['error_uri'])) {
	    		echo '<a class="text-center" href="{{response.error_uri}}">more information</a>';
	    	}
    	}
    
        
    //{% elseif response is iterable %}
    //    <pre>{{ response|json_stringify }}<pre>
    //{% else %}
    //    <p>
    //        Unable to parse response:
    //    </p>
    //    <pre>{{ dump(response) }}<pre>
    //{% endif %}
    
    ?>
</p>

<?php //debug($response); ?>