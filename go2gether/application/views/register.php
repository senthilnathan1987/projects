<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="row">
	<div class="col-lg-12">
		<div class="well">
			<div class="row">
				<div class="col-lg-7">
					
					<div class="signupContainer">
						

						<!-- <div class="fbButtonContainer">
							<button type="button" class="btn btn-primary facebookBtn">
								Connect with facebook
							</button>
							<hr />
						</div> -->
						
						<div class="signupTxtContainer">

							<form class="form-horizontal" method="post" action="<?php echo site_url("/auth/register"); ?>" role="form" id="signupForm">
								<div class="form-group">
									<label for="fname" class="col-sm-4 control-label">First name</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" data-vreq="req" name="fname" id="fname" placeholder="First name">
									</div>
								</div>

								<div class="form-group">
									<label for="lname" class="col-sm-4 control-label">Last name</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" data-vreq="req" name="lname"  id="lname" placeholder="Last name">
									</div>
								</div>

								<div id="email-feedback" class="form-group  has-feedback email-feedback">
									<label for="email" class="col-sm-4 control-label">Email</label>
									<div class="col-sm-6">
										<input type="text" class="form-control registration-email" data-vreq="req" name="email" id="email" placeholder="Email">
										<p class="emailAvailableError error">Email already register with us.Please try to login with this email id</p>
										<span class="glyphicon glyphicon-remove form-control-feedback"></span>
										<span class="glyphicon glyphicon-ok form-control-feedback"></span>
									</div>
								</div>
								
								
								<div class="form-group">
									<label for="email" class="col-sm-4 control-label">Gender</label>
									<div class="col-sm-6">
								
								    <input type="radio" name="gender" id="male" value="male" checked="checked"> Male
								  
								    <input type="radio" name="gender" id="female" value="female"> Female
								
								  
								
								</div>
								</div>
								
								
								<div class="form-group">
									<label for="lname" class="col-sm-4 control-label">Working at</label>
									<div class="col-sm-6">
										<input type="text" data-vreq="req" class="form-control" name="working"  id="working" placeholder="working at">
									</div>
								</div>
								
								
								<div class="form-group">
									<label for="password"  class="col-sm-4 control-label"></label>
									<div class="col-sm-6">
										<span class="error passNotMatch">Password not matched</span>
									</div>
								</div>
								
								<div class="form-group">
									<label for="password"  class="col-sm-4 control-label">Password</label>
									<div class="col-sm-6">
										<input type="password" data-vreq="req" class="form-control reg-password" name="password" id="password" placeholder="Password">
									</div>
								</div>

								<div class="form-group">
									<label for="cpassword"   class="col-sm-4 control-label">Confirm password</label>
									<div class="col-sm-6">
										<input type="password" data-vreq="req" class="form-control reg-cpassword" name="cpassword" id="cpassword" placeholder="Confirm password">
									</div>
								</div>

								<div class="form-group">
									<label for="cpassword" class="col-sm-4 control-label">Date of Birth</label>
									<div class="col-sm-6">
										<input type="text" data-vreq="req" class="form-control" id="dobdatePick" name="dob" data-format="dd/MM/yyyy" placeholder="dd/MM/yyyy">
										
									</div>
								</div><!-- /input-group -->

								<div class="form-group">

									<div class="col-sm-12">
										<div class="checkbox">
											<label>
												<input type="checkbox">
												Receive updates on new features, or useful information for you </label>
										</div>
									</div>
								</div>
<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Reset
							</button>
							<button type="submit" class="btn btn-primary signupBtn">
								Register
							</button>
						</div>
							</form>
							
							
						</div>
					</div>
					
					
					
					<div class="panel panel-success register-step1">
							  <div class="panel-heading"><b>Thanks to register with us.One more step to go.Verify your email address</b></div>
							  <div class="panel-body">
							   An  email with verification code has been sent to your mail. Please check your mail and click the activation link.
							  </div>
							</div>
				</div>
			</div>
		</div>
	</div>

