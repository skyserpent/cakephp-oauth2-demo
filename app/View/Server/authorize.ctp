    <!-- Static masthead -->
    <div class="navbar navbar-masthead navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
		  	<span style="font-family:sans; font-size:23px;">
		  		<?php 
		  			$colors = ['blue', 'red', 'orange', 'green', ''];
		  			
		  			foreach ($colors as $color) {
		  				if ($color == 'blue') {
		  					echo "<font style='color:$color'>G</font>";
		  				} else if ($color == 'red') {
		  					echo "<font style='color:$color'>o</font>";
		  				} else if ($color == 'orange') {
		  					echo "<font style='color:$color'>o</font>";
		  				} else if ($color == 'green') {
		  					echo "<font style='color:$color'>g</font>";
		  				} else {
		  					echo "<font style='color:red'>e</font>";
		  				}
		  			}
		  		?>
		  	</span>
		  </a>
          <p class="navbar-text pull-right">Signed in as <a href="javascript:void(0)" class="navbar-link"><?php echo $this->Session->read('Auth.User.username'); ?></a></p>
        </div>
        
      </div>
    </div>


    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div style="width:370px; margin:0 auto;">
	      <h4><strong><?php echo $client_id ?></h4></strong><br>
	      <h4><?php echo $client_id ?> would like to:</h4>
	      
	      <style>
	      	.app-request {
	      		border-top:2px #eee solid; border-bottom:2px #eee solid; padding: 15px;
	      		background: white url(../img/info-circle.png) right no-repeat;
	      		background-size: 15px;
	    		padding-right: 17px;
	      	}
	      	.app-request-2 {
	      		border-bottom:2px #eee solid; padding: 15px;
	      		background: white url(../img/info-circle.png) right no-repeat;
	      		background-size: 15px;
	    		padding-right: 17px;
	      	}
	      </style>
	      
	      <div class="app-request">View your email address</div>
	      <div class="app-request-2">View basic information about your account</div><br>
	      
	      <small><?php echo $client_id ?> and Googe will use this information in accordance with their respective terms of service and privacy policies.</small>
	      <br><br>
	      
	      <span class="pull-right">
	      
	      <form style="display:inline;" id="cancel" action="<?php echo 'http://localhost/oauthapp/server/authorize' . '?' . http_build_query($query)?>" method="post">
            <button type="button" onclick="document.getElementById('cancel').submit()" class="btn btn-default">Cancel</button>
            <input type="hidden" name="authorize" value="0" />
          </form>
	      <form style="display:inline;" action="<?php echo '?' . http_build_query($query)?>" method="post">
            <input type="submit" class="btn btn-primary" value="Accept" />
            <input type="hidden" name="authorize" value="1" />
          </form>
	      
	      </span>
      </div>

    </div> <!-- /container -->

