<?php

	if(!defined('DIRECT_ACCESS')) {
		die("Direct access is forbidden.");
	}
	echo "<pre>";
	echo route('userLogin');
	echo "</pre>";
	require_once view_url() . 'statics/header.php';
	
 ?>
 
 <!-- Header -->
	    <header id="top" class="header">
	        <div class="text-vertical-bottom">
	            <h1>Welcome to SJMNRC</h1>
           		<h2>Stylish picture of our city, Saint John at sunrise.</h2>
	            <br/>
	        </div>
	    </header>
	    <!-- About-->
	    <section id="about" class="about">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12 text-center">
	                	<img class="about_sjmnrc" src="<?php echo asset_url() . 'images/logo/sjmnrc.jpg'; ?>" alt="SJMNRC Logo"/>
		                <nav class="navbar navbar-default navbar-fixed-top">
							<div class="container">
								<div class="navbar-header">
						
									<!-- Collapsed Hamburger -->
									<button type="button" class="navbar-toggle collapsed"
										data-toggle="collapse" data-target="#app-navbar-collapse">
										<span class="sr-only">Toggle Navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="collapse navbar-collapse" id="app-navbar-collapse">
									<!-- Right Side Of Navbar -->
									<ul class="nav navbar-nav navbar-right">
										<!-- Authentication Links -->
										<li><a href="<?php echo route('userLogin'); ?>">Login</a></li>
									</ul>
								</div>
							</div>
						</nav>
	                </div>
	            </div> <!-- /.row -->
	        </div><!-- /.container -->

		<div class="services bg-primary">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-10 col-lg-offset-1">
						<h2>What we do</h2>
						<hr class="small">
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<div class="service-item">
									<span class="fa-stack fa-4x"> 
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-users fa-stack-1x text-primary"></i>
									</span>
									<h4>
										<strong>Volonteer application</strong>
									</h4>
									<p>
										We can find here the volonteer application form.A new design
										and more complete form than the first one.<br />
									</p>
									<p></p>
									<a href="/volunteer" class="btn btn-light">Apply Now</a>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="service-item">
									<span class="fa-stack fa-4x">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-compass fa-stack-1x text-primary"></i>
									</span>
									<h4>
                                            <strong>Event planning</strong>
                                        </h4>
                                        <p>Here is the new event planning system, connected to the volonteer and client list.</p>
                                        <br/>
                                        <a href="#" class="btn btn-light">Learn More</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="service-item">
                                        <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-plus fa-stack-1x text-primary"></i>
                                    </span>
                                        <h4>
                                            <strong>Client Management</strong>
                                        </h4>
                                        <p>Create, update Client and more</p>
                                        <br/><br/>
                                        <a href="#" class="btn btn-light">Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.col-lg-10 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container -->
            </div><!-- ./services bg-primary -->
<?php 
 	require_once view_url() . 'statics/footer.php';
 ?>