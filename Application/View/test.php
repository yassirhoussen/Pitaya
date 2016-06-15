<?php

	if(!defined('DIRECT_ACCESS')) {
		die("Direct access is forbidden.");
	}
	require_once view_url() . 'statics/header.php';
 ?>
 
 <div class="col-sm-6">
	 <form action="<?php echo route('testHome');?>" method="POST">
	 	<div class="form-group">
	 		<input class="form-control" type="text" id="1" name="form[text][firstName]" placeholder="firstname" />
	 	</div>
	 	<div class="form-group">
	 		<input class="form-control" type="text" id="1" name="form[text][lastName]" placeholder="lastname" />
	 	</div>
	 	<div class="form-group">
			<div class="col-sm-3">
		    	<button style="marging-right: 50px;" class="btn btn-md btn-primary" type="submit" name="login_submit">Sign in</button>
			</div>
	 	</div>
	 </form>
 </div>
 