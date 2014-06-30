        <div class="col-lg-12">
         	<div class="menu-panel">
				
				<div class="profile-big-image pull-left">
					 <div class="callbacks_container">
					      <ul class="rslides" id="slider4">
					        <li>
					         <img src="<?php echo base_url();?>common/images/profile_pictures/big/1.jpg" width='100%'/>
					          
					        </li>
					        <li>
					        <img src="<?php echo base_url();?>common/images/profile_pictures/big/2.jpg" width='100%'/>
					          
					        </li>
					        <li>
					        <img src="<?php echo base_url();?>common/images/profile_pictures/big/3.jpg" width='100%'/>
					          
					        </li>
					      </ul>
					    </div>
					
				</div>
				
				<div class="about-container">
					<h3>About <?php echo ( $query_user_details[0]->username); ?></h3>
					
					
					
					<p >Trekking in Savanadurga can be a challenge as you climb up the smooth monolith which comprises of two hills, Karigudda and Biligudda. It is a great destination to try out your trekking and rock climbing skills 
					
						
					
				   </p>
					<div class="work_education">
					
					<h4>Work and Education</h4>
					<ul id="work_education_container">
						<li>
							<div class="info_title">SapientNitro</div>
							<div class="small-font">Interactive Developer · Bangalore, India · Mar 23, 2013 to present</div>
						</li>
						<li>
							<div class="info_title">TriKonnect Technologies</div>
							<div class="small-font">PHP Developer, UI developer · Bangalore, India · Jun 2012 to Mar 2013</div>
						</li>
						<li>
							<div class="info_title">K.S.Rangasamy college of technology</div>
							<div class="small-font">Information Technology</div>
						</li>
						<li>
							<div class="info_title">s.j.v.matric her school</div>
							<div class="small-font">Class of 2005 · Salem, Tamil Nadu</div>
						</li>
					</ul>
				
					
				</div>
				</div>
				
				
				
				
				
				
				
				
				
				<div class="basic-info">
					<h4>Basic informations</h4>
					<table>
						<tr>
							<td>Birthday</td>
							<td>May 24, 1987</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>Male</td>
						</tr>
						<tr>
							<td>Interested In</td>
							<td>Men and Women</td>
						</tr>
						<tr>
							<td>Relationship Status</td>
							<td>Single</td>
						</tr>
						<tr>
							<td>Religious Views</td>
							<td>Hindu</td>
						</tr>
					</table>
					
					<h4>Contact Information</h4>
					<table class="contact-info-table">
						<tr>
							<td>Mobile Phones</td>
							<td>090 35 323621</td>
						</tr>
						<tr>
							<td>Screen Name</td>
							<td>tutlabs</td>
						</tr>
						
						<tr>
							<td>Email</td>
							<td>msnjsk@facebook.com</td>
						</tr>
						
					</table>
				</div>
				
				
				
				
				<div class="closed-profile-container pull-right">
				
				 <div class="profile-medium-image">
				 	<div id="profile_pic">
				 		<div id="spinner" style="display:none;position:absolute;">
							<img src="<?php echo base_url();?>common/images/loading.gif" border="0">
						</div>
				 	     <img id="profile_img" src="<?php echo $query_user_details[0]->medium_img_path;?>" width='100%'/>
				 	     
				 	     <?php
				 	     if($session_user_id!==$userid)
						 {
						 	
						 }else{
						 	
						 ?>
				 	     <div class="btn-group change_profile_toggle" style="width: 100%;">
						  <button type="button" class="btn-primary btn-xs dropdown-toggle update_profile_pic" data-toggle="dropdown">
						    Update profile picture
						  </button>
						  <ul class="dropdown-menu width-100" role="menu">
						    <li><a href="#" class="change_profile_pic_btn">Upload photo</a></li>
						
						    <li><a class="fancybox" href="#camera-model">Take photo</a></li>
						    
						  </ul>
						</div>
				 	     <?php
						 }
						 ?>
				 	     
				 	     
				 	</div>
				 	<div id="qrcode"></div>
				 	<p id="qrcode_content">http://connect.tutlabs.info/index.php/profile/user/<?php echo ( $query_user_details[0]->uid); ?></p>
				 	<div class="profile-name"><?php echo ( $query_user_details[0]->username); ?></div>
				 	</div>
				 	
				 	<?php 
				 	//if($session_user_id!==$userid)
				 	//{
				 	 ?>
				 	<!--<div>
				 		<ul class="users-action">
				 			<li><a href="#" class="add_friend_btn" id="<?php echo $query_user_details[0]->uid; ?>"><i class="friend icon-plus"></i>Friend</a></li>
				 			<li><a href="#"><i class="message icon-envelope"></i>Message</a></li>
				 		</ul>
				 	</div> -->
				 	<?php //}
					?>
					
					
				 	<div class="static-list">
				 		<ul>
				 			<li class="aboutUs_toggle">
							About
								
							
						</li>
						<li>
							Friends
							<span class="badge"><?php echo $count_total_my_friends; ?></span>
						</li>
						<li>
							Photos
							<span class="badge">0</span>
						</li>
						
					</ul>
				 		
				 	</div>
				 	
				 
					   
					 </div>"
				 	
				</div>
			</div>
        </div>
        
<!-- take photo container -->
<div id="camera-model" style="width:400px;display: none;">
		 <div id="screen"></div>
		 <div class='take-photo-btn'>
		 	<a href="#" class="btn btn-primary" id="shootButton">Take a snap</a>
		 </div>
		  <div class='take-photo-btn hidden-panel'>
		  	<a href="#" class="btn " id="cancelButton">Cancel</a>
		 	<a href="#" class="btn btn-primary" id="shoot_upload_Button">Upload</a>
		 </div>
	</div>


