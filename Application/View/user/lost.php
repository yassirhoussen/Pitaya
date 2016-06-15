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
			    </li><span> / </span></li>
			    <li><a href="login">Login</a></li>
			    </li><span> / </span></li>
			    <li class="active">Lost Password</li>
			</ul>
			<form class="form-signin" action="user/lostpassword" method="POST">
		    	<h2 class="form-signin-heading text-center">Lost Password</h2>
		        <div class="form-group">
		        	<label for="inputEmail" class="sr-only">Email address</label>
		        	<input type="email" id="inputEmail" class="form-control" name="form[email][email]" placeholder="Email address" required="" autofocus="" value=""/>
		        </div>
		        <div class="form-group">
		    	    <div class="col-sm-offset-10">
		    	    	<button style="marging-right: 50px;" class="btn btn-md btn-primary" type="submit" name="login_submit">Sign in</button>
		    		</div>
		    	</div>
		    </form>
		</div>
	</div>
    </div>
    
<?php 
 	require_once view_url() . 'statics/footer.php';
 ?>