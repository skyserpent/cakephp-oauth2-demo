<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>CakePHP OAuth</title>

    <?php
    	// Bootstrap core CSS
	    echo $this->Html->css('bootstrap');
	    
	    // TODC Bootstrap core CSS
		echo $this->Html->css('todc-bootstrap');
		
		// If controller is users, show login
		if ($this->params['controller'] == 'users') {
			echo $this->Html->css('signin');
		
		// If user is logged in and controller is auth, show auth
		} else if ($this->params['controller'] == 'authorize') {
			echo $this->Html->css('masthead-static-top');
		}
	?>
	
	<style>
		.nav-tabs > li, .nav-pills > li {
		    float:none;
		    display:inline-block;
		    *display:inline; /* ie7 fix */
		     zoom:1; /* hasLayout ie7 trigger */
		}
		
		.nav-tabs, .nav-pills {
		    text-align:center;
		}
	</style>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php
    	echo $this->Session->flash(); 
    	// echo $this->Session->flash('auth');
    ?>
    
	<?php echo $this->fetch('content'); ?>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <?php
    	// Bootstrap core CSS
	    echo $this->Html->script('bootstrap');
	?>
  </body>
</html>






