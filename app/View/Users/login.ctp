	  <div class="container">
		  <h1 class="text-center" style="color:gray;">One Account. All of Googe.</h1>
	      <h2 class="form-signin-heading text-center">Sign in with your Googe Account</h2>
	
	      <div class="card card-signin">
	        <?php echo $this->Html->image('avatar_2x.png', array('class' => 'img-circle profile-img')); ?>
	        <form class="form-signin" role="form" id="UserLoginForm" accept-charset="utf-8" method="post" action="/oauthapp/users/login">
	          <input type="text" id="UserUsername" name="data[User][username]" class="form-control" placeholder="Email" required autofocus>
	          <input type="password" id="UserPassword" name="data[User][password]" class="form-control" placeholder="Password" required>
	          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	
	          <div>
	            <a class="pull-right">Need help?</a>
	            <label class="checkbox">
	              <input type="checkbox" value="remember-me"> Stay signed in
	            </label>
	          </div>
	
	        </form>
	      </div>
	
	      <p class="text-center">
	        <a><?php echo $this->Form->create('User'); ?></a>
	      </p>

      </div> <!-- /container -->
