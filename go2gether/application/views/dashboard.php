<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="bs-example bs-example-tabs">
					<ul id="myTab" class="nav nav-tabs">
						<li class="active">
							<a href="#dashboard" data-toggle="tab">Dashboard</a>
						</li>
						<li >
							<a href="#Rides_offered" data-toggle="tab">Rides offered</a>
						</li>
						<li >
							<a href="#profile" data-toggle="tab">Profile</a>
						</li>
						<li >
							<a href="#message" data-toggle="tab">Message</a>
						</li>

					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="dashboard">
							<div class="row">
								<div class="col-lg-2">
									<?php if($result->profile_pic==''){  ?>
									<img class="profile_img" src="<?php echo base_url(); ?>profile_pic/man-profile.jpg" width="100%" />
									<?php }else{ ?>
									<img class="profile_img" src="<?php echo base_url(); ?>upload/<?php echo $result->profile_pic;  ?>" width="100%" />	
									<?php } ?>
									
								</div>
								<div class="col-lg-10">
									<span class="glyphicon glyphicon-user glyphicon user-icon-dashboard"></span><span class="username-dashboard">Mr.<?php echo $result->username; ?></span>
									<div class="panel panel-default">

										<div class="panel-body">
											
											<?php echo $result->personal_biography; ?>
										</div>
									</div>

								</div>
								<div class="col-lg-10">
									<span class="glyphicon glyphicon-qrcode user-icon-dashboard"></span><span class="username-dashboard">Personal information</span>
									<div class="panel panel-default">

										<div class="panel-body">
											<ul class="personal-info icons margin-none">
												<li class="">
													<i class="glyphicon glyphicon-calendar"></i><span class="label label-default"><?php echo  date("d",strtotime($result->personal_dob)); ?></span><span class="label label-default"><?php echo date("F",strtotime($result->personal_dob)); ?></span><span class="label label-default"><?php echo date("Y",strtotime($result->personal_dob)); ?></span>
												</li>
												<li class="">
													<i class="glyphicon glyphicon-briefcase"></i> Working at <?php echo $result->personal_company; ?>
												</li>
												<li class="">
													<i class="glyphicon glyphicon-time"></i> Last login  <span class="label label-default"><?php echo date("F j, Y",strtotime($result->last_login)); ?></span>
												</li>
												<li class="">
													<i class="glyphicon glyphicon-star"></i> Member since  <span class="label label-default"><?php  echo date("F j, Y",strtotime($result->created));?></span>
												</li>
											</ul>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="tab-pane fade " id="Rides_offered">
							<div class="alert alert-success" id="offerDeletedAlert">
									      <strong>Well done!</strong> Your ride has been deleted
									    </div>
						<?php if($ride_list==null){ ?>
						    <div class="alert alert-danger" style="margin-top: 10px;">
					      <strong>Oh snap!</strong> You have no rides offerd.
					    </div>
					    <?php }else{ ?>
							<?php foreach ($ride_list as $row)
										{?>
							<div class="panel panel-default " id="offers-row-<?php echo $row->ride_id; ?>">

								<div class="panel-body">
									
									
									<div class="row">
										<div class="col-lg-6">
											<h4><span class="glyphicon glyphicon-map-marker"></span> <?php echo $row->ride_departure; ?> → <?php echo $row->ride_arrival; ?></h4>
											<p>
												<span class="glyphicon glyphicon-calendar"></span> date: <?php echo $row->ride_pick_date; ?>, <span class="glyphicon glyphicon-time"></span> Departure time: <?php echo $row->ride_pick_time; ?>
											</p>
										</div>
										<div class="col-lg-6">
											<div class="pull-right">
												<!-- <div class="row" style="margin-right: 0px;margin-bottom: 5px;">
													<label for="demo2" class="col-md-8 control-label" style="padding-top: 10px;text-align: right;">Number of seats offerd</label>
													<input id="passanger" type="text" value="<?php echo $row->ride_seats; ?>" name="passanger" class="col-md-5 form-control">
												</div> -->
												<div class="row">
													<div class="col-lg-12 ">
														<div class="pull-right">
															<button type="button" class="btn btn-success">
																<i class="glyphicon glyphicon-pencil"></i> Edit
															</button>
															<a href="<?php echo site_url("/view_offer/$row->ride_id"); ?>" class="btn btn-success">
																<i class="glyphicon glyphicon-search"></i>View
															</a>
															<button type="button" class="btn btn-danger delete-offer-btn" data-offerId="<?php echo $row->ride_id; ?>">
																<i class="glyphicon glyphicon-remove"></i>Delete
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									
									
								</div>
							</div>
							<?php 
									}
									}
									?>
						</div>
						<div class="tab-pane fade" id="profile">
							<ul class="nav nav-pills nav-stacked col-md-2">
								<li class="active">
									<a href="#Personal_Informations" data-toggle="pill">Personal Informations</a>
								</li>
								<li>
									<a href="#Profile_Photo" data-toggle="pill">Profile Photo</a>
								</li>
								<li>
									<a href="#Preferences" data-toggle="pill">Preferences</a>
								</li>
								<li>
									<a href="#YourCar" data-toggle="pill">Your Car</a>
								</li>
								<li>
									<a href="#tab_d" data-toggle="pill">Verification</a>
								</li>
								<!-- <li>
									<a href="#tab_d" data-toggle="pill">Address</a>
								</li> -->
							</ul>
							<div class="tab-content col-md-10 well">
								
								<div class="tab-pane active" id="Personal_Informations">
									<h4>Personal Informations</h4>
									<form class="form-horizontal" method="post" action="" role="form" id="personal_info_form">
										<div class="form-group">
											<label for="fname" class="col-sm-4 control-label">First name</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="fname" id="fname" placeholder="First name" value="<?php echo $result->personal_fname; ?>">
											</div>
										</div>

										<div class="form-group">
											<label for="lname" class="col-sm-4 control-label">Last name</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="lname"  id="lname" placeholder="Last name" value="<?php echo $result->personal_lname; ?>">
											</div>
										</div>

										<div class="form-group">
									<label for="email" class="col-sm-4 control-label">Gender</label>
									<div class="col-sm-6">
								<div class="btn-group" data-toggle="buttons">
									
									<?php if($result->personal_gender=="male"){ ?>
									
								  <label class="btn btn-primary active">
								    <input type="radio" name="gender" id="male" checked="checked"  value="male"> Male
								  </label>
								   <label class="btn btn-primary">
								    <input type="radio" name="gender" id="female" value="female"> Female
								  </label>
								  <?php }else{ ?>
								  	 <label class="btn btn-primary ">
								    <input type="radio" name="gender" id="male" checked="checked"  value="male"> Male
								  </label>
								  <label class="btn btn-primary active">
								    <input type="radio" name="gender" id="female" checked="checked"  value="female"> Female
								  </label>
								  <?php } ?>
								</div>
								</div>
								</div>
								<div class="form-group">
									<label for="lname" class="col-sm-4 control-label">Working at</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="working"  id="working" placeholder="working at" value="<?php echo $result->personal_company; ?>">
									</div>
								</div>

										<div class="form-group">
											<label for="email" class="col-sm-4 control-label">Email</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $result->personal_email; ?>">
											</div>
										</div>

										<div class="form-group">
											<label for="lname" class="col-sm-4 control-label">Mobile</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="mobile"  id="mobile" placeholder="Mobile" value="<?php echo $result->personal_mobile; ?>">
											</div>
										</div>

										<div class="form-group">
											<label for="cpassword" class="col-sm-4 control-label">Date of Birth</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="dobdatePick" name="dob"  placeholder="dd/MM/yyyy" value="<?php echo $result->personal_dob; ?>">

											</div>
										</div><!-- /input-group -->

										<div class="form-group">
											<label for="lname" class="col-sm-4 control-label">Biography</label>
											<div class="col-sm-6">
												<textarea class="form-control" id="bio" name="bio"><?php echo $result->personal_biography; ?></textarea>
											</div>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">
												Reset
											</button>
											<button type="button" class="btn btn-primary personalUpdateBtn">
												Update
											</button>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="Profile_Photo">
						<h4>Profile photo</h4>
						<form class="form-horizontal" method="post" action="" role="form" id="profile_pic_form" enctype="multipart/form-data">
									<table class="table table-bordered table-striped">

										<tbody>
											<tr style="background: #fff;">
												<td width="15%">
													<?php if($result->profile_pic==''){  ?>
									<img class="profile_img" src="<?php echo base_url(); ?>profile_pic/man-profile.jpg" width="100%" />
									<?php }else{ ?>
									<img class="profile_img" src="<?php echo base_url(); ?>upload/<?php echo $result->profile_pic;  ?>" width="100%" />	
									<?php } ?>
												</td>
												<td>
												<p>
													Add your photo now ! Other members will be reassured to see with whom they'll be travelling, and you'll find your car share much more easily. Photos also help members recognizing each other
												</p>
												<div class="fileinput fileinput-new" data-provides="fileinput" style="width: 80%;">
													<div class="input-group">
														<div class="form-control uneditable-input span3" data-trigger="fileinput">
															<i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span>
														</div>
														<span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
															<input type="file" name="userfile" id="userfile">
														</span>
														<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													</div>
												</div>
												<p>
													<div class="modal-footer">

														<button type="submit" class="btn btn-primary signupBtn">
															Update
														</button>
													</div>
												</p></td>
											</tr>

										</tbody>
									</table>
</form>
								</div>
								<div class="tab-pane" id="Preferences">
									<h4>My car share preferences</h4>
									<form class="form-horizontal" method="post" action="" role="form" id="preference_form">
									<div class="btn-group" data-toggle="buttons">
										
										<?php if($result->chat==1){ ?>
										<label class="btn btn-default active">
											<input type="checkbox" name="chat_preference" value="1" checked="checked">
											Chattiness:<img src="<?php echo base_url(); ?>assets/img/condition_icons/chat.png" width="34" height="33" /> </label>
										<?php }else{ ?>
										<label class="btn btn-default">
											<input type="checkbox" name="chat_preference" value="1">
											Chattiness:<img src="<?php echo base_url(); ?>assets/img/condition_icons/chat.png" width="34" height="33" /> </label>
											<?php } ?>	
												
										
										
										
										<?php if($result->pet==1){ ?>	
										<label class="btn btn-default active">
											<input type="checkbox" name="pet_preference" value="1" checked="checked">
											Pets: <img src="<?php echo base_url(); ?>assets/img/condition_icons/dog_allow.png" width="34" height="33" /> </label>
										<?php }else{ ?>
										<label class="btn btn-default">
											<input type="checkbox" name="pet_preference" value="1">
											Pets: <img src="<?php echo base_url(); ?>assets/img/condition_icons/dog_allow.png" width="34" height="33" /> </label>	
										<?php } ?>
										
										
										
											
										<?php if($result->smoke==1){ ?>		
										<label class="btn btn-default active">
											<input type="checkbox" name="smoke_preference" value="1" checked="checked">
											Smoking: <img src="<?php echo base_url(); ?>assets/img/condition_icons/smoke.png" width="34" height="33" /> </label>
										<?php }else{ ?>	
										<label class="btn btn-default">
											<input type="checkbox" name="smoke_preference" value="1">
											Smoking: <img src="<?php echo base_url(); ?>assets/img/condition_icons/smoke.png" width="34" height="33" /> </label>
									   <?php } ?>	
											
											
										
										<?php if($result->music==1){ ?>			
										<label class="btn btn-default active">
											<input type="checkbox" name="music_preference" value="1" checked="checked"> 
											Music: <img src="<?php echo base_url(); ?>assets/img/condition_icons/music.png" width="34" height="33" /> </label>
										<?php }else{ ?>		
										<label class="btn btn-default">
											<input type="checkbox" name="music_preference" value="1">
											Music: <img src="<?php echo base_url(); ?>assets/img/condition_icons/music.png" width="34" height="33" /> </label>
										<?php } ?>	
											
									</div>
									</form>
									<div class="modal-footer">

										<button type="submit" class="btn btn-primary preferenceUpdateBtn">
											Update
										</button>
									</div>
								</div>
								
								<div class="tab-pane" id="YourCar">
									<h4>My car </h4>
									<div class="alert alert-success" id="carDetailUpdateSuccess" style="display: none;">
									      <strong>Well done!</strong> Your car details updated successfully..
									 </div>
																		
									<form class="form-horizontal" method="post" action="" role="form" id="mycar_info_form">
										<div class="form-group">
											<label for="fname" class="col-sm-4 control-label">Car Make</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="make" id="make" placeholder="Make" value="<?php echo $carDetail->car_make; ?>">
											</div>
										</div>
										
										<div class="form-group">
											<label for="fname" class="col-sm-4 control-label"> Car Model</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="model" id="model" placeholder="Car model" value="<?php echo $carDetail->car_model; ?>">
											</div>
										</div>
										
										<div class="form-group">
											<label for="fname" class="col-sm-4 control-label"> Car Comfort</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="comfort" id="comfort" placeholder="Comfort" value="<?php echo $carDetail->car_comfort; ?>">
											</div>
										</div>
										
										<div class="form-group">
											<label for="fname" class="col-sm-4 control-label"> Number of Seats</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="seats" id="seats" placeholder="seats" value="<?php echo $carDetail->car_seats; ?>">
											</div>
										</div>
										
										<div class="form-group">
											<label for="fname" class="col-sm-4 control-label"> Car Color</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="color" id="color" placeholder="Car Color" value="<?php echo $carDetail->car_color; ?>">
											</div>
										</div>
										
										<div class="form-group">
											<label for="fname" class="col-sm-4 control-label"> Car Type</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="type" id="type" placeholder="Car Type" value="<?php echo $carDetail->car_type; ?>">
											</div>
										</div>
										
										<div class="modal-footer">
											<button type="button" class="btn btn-primary carUpdateBtn"> Update </button>
										</div>
										
									</form>	
										
										
								</div>
								
								<div class="tab-pane" id="tab_d">
									<h4>Pane D</h4>
									<p>
										Pellentesque habitant morbi tristique senectus et netus et malesuada fames
										ac turpis egestas.
									</p>
								</div>
							</div><!-- tab content -->
						</div>
						
						
						
						
						
						<div class="tab-pane fade" id="message">
							<ul class="nav nav-pills nav-stacked col-md-2">
								<li class="active">
									<a href="#inbox" data-toggle="pill">Inbox</a>
								</li>
								
								
								
							</ul>
							<div class="tab-content col-md-10 well">
							
								
								<div class="tab-pane active" id="inbox">
									 <?php if($messages==null){ ?>
						    <div class="alert alert-danger" style="margin-top: 10px;">
					      <strong>Oh snap!</strong> You have no messages to display.
					    </div>
					    <?php }else{ ?>
							
									<div class="msg_header">
								<input type="checkbox" id="check_all" value=""><label for="check_all" class=""> Select all messages</label>
							<button type="button" class="btn btn-danger msg_delete_btn pull-right"><i class="glyphicon glyphicon-trash"></i></button>
																
							
							</div>
										
						<table class="table table-inbox table-hover">
                            <tbody>
                            	<?php foreach ($messages as $row)
										{?>	
                           
                              <tr class="unread" id="msg_row_<?php echo $row->message_id; ?>" data-toggle="modal" data-target="#myModal" data-msg-id="<?php echo $row->message_id; ?>" >
                                  <td class="inbox-small-cells">
                                      <input  class="mail-checkbox" name="need_delete[]" type="checkbox" id="<?php echo $row->message_id; ?>" value="<?php echo $row->message_id; ?>" />
                                  </td>
                                 
                                  <td class="view-message msg_name"><?php echo $row->personal_fname; ?></td>
                                  <td class="view-message msg_desc"><?php echo $row->message_desc; ?></td>
                                  <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message  text-right"><?php echo date('g:i a',strtotime($row->created_date)); ?></td>
                              </tr>
                              <?php }  }?>
                              
                              
                          </tbody>
                          </table>
								</div>
			
						
							</div><!-- tab content -->
						</div>
						
						
						
						
						
						
						
						

					</div>
				</div>

			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Message</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		 <div class="form-group">
			    <label class="col-sm-3 control-label">From:</label>
			    <div class="col-sm-9">
			      <p class="form-control-static" id="fromMailId"></p>
			    </div>
			  </div>
	   </div>
	  
	 <div class="row">
			   <div class="form-group">
			    <label class="col-sm-3 control-label">Subject:</label>
			    <div class="col-sm-9">
			      <p class="form-control-static" id="MailSubject"></p>
			    </div>
			  </div>
	 </div>
	 <div class="row">
			   <div class="form-group">
			    <label class="col-sm-3 control-label">Mobile number:</label>
			    <div class="col-sm-9">
			      <p class="form-control-static" id="mobileNumber"></p>
			    </div>
			  </div>
	 </div>
	 <div class="row">
			   <div class="form-group">
			    <label class="col-sm-3 control-label">Message:</label>
			    <div class="col-sm-9">
			      <p class="form-control-static" id="message_description"></p>
			    </div>
			  </div>
	 </div>
      </div>
     
     
    </div>
  </div>
</div>
