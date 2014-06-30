<!-- NAVBAR
================================================== -->

		<div class="navbar-wrapper">

			<div class="navbar navbar-default menu-navigation" role="navigation">
				<div class="">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- <a class="navbar-brand" href="<?php echo site_url("home/"); ?>"><img src="<?php echo base_url();?>/assets/img/car_logo.png" alt="logo"></a> -->
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="<?php  if(isset($home)){ echo "active"; } ?>">
								<a href="<?php echo site_url("home/"); ?>">Home</a>
							</li>
							<li class="<?php  if(isset($find_ride)){ echo "active"; } ?>">
								<a href="<?php echo site_url("home/find_ride"); ?>">Find a ride</a>
							</li>
							<li class="<?php  if(isset($offer_ride)){ echo "active"; } ?>">
								<a href="<?php echo site_url("home/offer_ride"); ?>">Offer a ride</a>
							</li>
							<li class="">
								<a href="#about">How it works</a>
							</li>
							<li class="">
								<a href="#contact">Contact</a>
							</li>

						</ul>

						<!-- login and signup holder -->
						<?php if($this->tank_auth->is_logged_in()){ ?>
					        
							<div class="btn-group loginSuccessHolder">
							  <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>  <?php echo $this->session->userdata('username'); ?></button>
							  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							    <span class="caret"></span>
							    <span class="sr-only">Toggle Dropdown</span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="<?php echo site_url("dashboard"); ?>">Dashboard</a></li>
							    
							    
							    <li class="divider"></li>
							    <li><a href="<?php echo base_url();?>index.php/auth/logout">Logout</a></li>
							  </ul>
							</div>
							<ul class="nav nav-pills nav-stacked loginSuccessRightMenu">
								  <!-- <li class="">
								    <a href="#">
								      <span class="badge pull-right">42</span>
								      <span class="glyphicon  glyphicon-envelope"></span>
								    </a>
								  </li> -->
								  <li class="">
								    <a href="#">
								      <span class="badge pull-right">42</span>
								      <span class="glyphicon glyphicon-bullhorn"></span>
								    </a>
								  </li>
								 
								</ul>
						<?php }else{ ?>
						<div class="btn-group LoginSignupButtonWrapper">
							<a href="<?php echo site_url("home/register"); ?>" class="btn btn-warning">Signup</a>
							<button type="button" class="btn btn-success" id="LoginBtn">
								Login
							</button>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="loginContainer">

				<form class="form-horizontal" role="form" id="loginForm">
					
					<div class="alert alert-danger login-fail">
      <strong>Opps!</strong> Invalid username or password...
    </div>
					<!-- <a href="auth/session/facebook" class="btn btn-primary facebookBtn"> Connect with facebook </a>

					<hr /> -->

					<div class="input-group ">

						<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
						<input type="text" class="form-control" name="loginEmail" id="InputEmail" placeholder="Email">
					</div>

					<div class="input-group ">

						<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
						<input type="password" class="form-control" name="loginPassword" id="InputPassword" placeholder="Password">
					</div>

					<label class="checkbox">
						
						<input type="checkbox" name="remember" value="on">
						Remember me </label><br/>

					<button type="button" class="btn btn-success loginBtn">
						Login
					</button>
				</form>
			</div>

		</div>
