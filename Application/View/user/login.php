<?php

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

require_once view_url() . 'statics/header.php';
?>

<div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<ul class="breadcrumb">
				    <li><a href="/">Home</a></li>
				    <li class="active">Login</li>
				</ul>
				<?php echo isset($show_message) ? '<div class="well"><p class="bg-warning">'.$show_message.'</p></div>' : ''; ?>
				<form class="form-signin" action="login" method="POST">
		        	<span></span><h2 class="form-signin-heading text-center">Please sign in</h2></span>
		        	<div class="form-group">
		        		<label for="inputEmail" class="sr-only">Email address</label>
		        		<input type="email" id="inputEmail" class="form-control" name="form[email][email]" placeholder="Email address" required="" autofocus="">
		        	</div>
		        	<div class="form-group">
		        		<label for="inputPassword" class="sr-only">Password</label>
		        		<input type="password" id="inputPassword" class="form-control" name="form[password][password]" placeholder="Password" required="">
			        </div>
			        <div class="form-group">
		    		    <div class="col-sm-3">
		    		    	<button style="marging-right: 50px;" class="btn btn-md btn-primary" type="submit" name="login_submit">Sign in</button>
		    			</div>
		    			<div class="col-sm-4 col-sm-offset-5">
		    				<a href="lostpassword" class="btn btn-md" style="color: red;"> Lost your password</a>  
		    			</div> 	    
			        </div>
			    </form>
			</div>
		</div>
    </div>

<?php 
 	require_once view_url() . 'statics/footer.php';
 ?>