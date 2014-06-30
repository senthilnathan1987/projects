
<div class="profile-content">
	

		
		
		<div class="row menu-panel">
<?php $this->load->view('about_panel'); ?>
       
        </div>

	     <div class="bb-custom-wrapper">

	     	<div class="row ">
	     		
	     		
	     		<div class="col-lg-12">
	     		
	     		
	     		  	
	     <div class="row">
	     	
	     			

  <div class="col-lg-8 right-padding-zero" id="post-left-container-height">
  	
  	
  		
  	
<div class=" secondary-menu-bar">
<div class="actions">

				    	<div id="user-stats">
					       <div><textarea class="status-textarea"></textarea></div>
					        <div class="status-tab-footer pull-left">
						    	<a href="#" class="post-btn btn btn-primary btn-xs pull-right">Post</a>
						    	
						    	<ul class="pull-right post-options">
						    		<li><a href='#'><i class="icon-camera"></i></a></li>
						    		<li><a href='#'><i class="icon-smile"></i></a></li>
						    		
						    	</ul>
						    </div>
				    	</div>

				    	<div id="quick-actions">
				    		<ul class="statistics">
				    			<li>
				    				<div class="top-info">
					    				<a href="#" title="" class="blue-square"><i class="icon-plus"></i></a>
					    				<strong>12,476</strong>
					    			</div>
									<div class="progress progress-micro"><div class="bar" style="width: 60%;"></div></div>
									<span>User registrations</span>
				    			</li>
				    			
				    			
				    			<li>
				    				<div class="top-info">
					    				<a href="#" title="" class="sea-square"><i class="icon-group"></i></a>
					    				<strong>562K+</strong>
					    			</div>
									<div class="progress progress-micro"><div class="bar" style="width: 50%;"></div></div>
									<span>Total users</span>
				    			</li>
				    			<li>
				    				<div class="top-info">
					    				<a href="#" title="" class="dark-blue-square"><i class="icon-facebook"></i></a>
					    				<strong>36,290</strong>
					    			</div>
									<div class="progress progress-micro"><div class="bar" style="width: 93%;"></div></div>
									<span>Facebook fans</span>
				    			</li>
				    		</ul>
				    	</div>

				    	<div id="map">
				    		<div id="google-map"></div>
				    	</div>

				    	<ul class="action-tabs">
				    		<li><a href="#user-stats" title="">Update status</a></li>
				    		<li><a href="#quick-actions" title="">Profile statistics</a></li>
				    		<li><a href="#map" title="" id="map-link">Add photos</a></li>
				    	</ul>
				    </div>
	     		<div class="post-loader"><img src="<?php echo base_url();?>common/images/loader/loader2.gif"></div>
	     	</div>
  	
  	<div id="post-list-container">
  		

  	<?php
  	foreach($query as $row){ ?>
	<div class="row element post-elements" id="post_<?php echo $row->up_id; ?>">
   	<input type="hidden" id="hidden_row_id" value="<?php echo $row->up_id; ?>" />
      <div class="col-lg-12">
        	<div class="news-feed-header-blue">
        		<img src="<?php echo $query_user_details[0]->medium_img_path;?>" width='50' height='50' />
        		<div class="btn-group pull-right post-actions">
                <a href="#"  data-toggle="dropdown"><i class="icon-chevron-down"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="#" class="deletePost" id="<?php echo $row->up_id; ?>"><i  class="icon-trash"></i>Delete</a></li>
                  <li><a href="#"><i class="icon-eye-close"></i>Hide this post</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
        		</div>
        	<div class="news-feed-container">
				<div class="media-holder">
					<div class="row">
						<div class="col-lg-12">
						<div class="col-lg-12 media no-padding ">
					     
					       <a href='<?php echo $row->post_description; ?>' class='oembed'><?php echo $row->post_description; ?></a>
					</div>
					
					</div>
					</div>
				</div>
				
			</div>
      </div>
    </div>
  	
  	
   

    <?php }
  	?>
  </div>
  </div>
  
  <div class="col-lg-4">
  	
  	<div class="row" id="friends-thumbs-list">
  		
  		<?php foreach($query_friends as $row){ ?>
  		<a data-toggle="tooltip" title="<?php echo $row->username; ?>"  href='<?php echo base_url();?>index.php/profile/user/<?php echo $row->friend_id; ?>'><div class="col-lg-3"><img src="<?php echo $row->medium_img_path; ?>" alt=""></div></a>
  		
  		<?php } ?>
  	</div>
  	<div class="row" id="recent-activities-list">
  		<div class="col-lg-12">
  			<div class="row" id="recent-box">
				  		<div class="col-lg-2">
				  			<img src="<?php echo base_url();?>common/images/profile_pictures/thumb/12.jpg" alt="">
				  		</div>
				  		<div class="col-lg-10 recent-info-txt">
				  			<span class="recent-user-name">Priyadarshini Jayakumar</span> likes Bejoya Raphel's photo.
				  		</div>
  	        </div>
  	        <div class="row" id="recent-box">
				  		<div class="col-lg-2">
				  			<img src="<?php echo $query_user_details[0]->medium_img_path;?>" alt="">
				  		</div>
				  		<div class="col-lg-10 recent-info-txt">
				  			<span class="recent-user-name">Priyadarshini Jayakumar</span> likes Bejoya Raphel's photo.
				  		</div>
  	        </div>
  	        <div class="row" id="recent-box">
				  		<div class="col-lg-2">
				  			<img src="<?php echo base_url();?>common/images/profile_pictures/thumb/12.jpg" alt="">
				  		</div>
				  		<div class="col-lg-10 recent-info-txt">
				  			<span class="recent-user-name">Priyadarshini Jayakumar</span> likes Bejoya Raphel's photo.
				  		</div>
  	        </div>
  	        <div class="row" id="recent-box">
				  		<div class="col-lg-2">
				  			<img src="<?php echo base_url();?>common/images/profile_pictures/thumb/12.jpg" alt="">
				  		</div>
				  		<div class="col-lg-10 recent-info-txt">
				  			<span class="recent-user-name">Priyadarshini Jayakumar</span> likes Bejoya Raphel's photo.
				  		</div>
  	        </div>
  	        <div class="row" id="recent-box">
				  		<div class="col-lg-2">
				  			<img src="<?php echo base_url();?>common/images/profile_pictures/thumb/12.jpg" alt="">
				  		</div>
				  		<div class="col-lg-10 recent-info-txt">
				  			<span class="recent-user-name">Priyadarshini Jayakumar</span> likes Bejoya Raphel's photo.
				  		</div>
  	        </div>
  	        <div class="row" id="recent-box">
				  		<div class="col-lg-2">
				  			<img src="<?php echo base_url();?>common/images/profile_pictures/thumb/12.jpg" alt="">
				  		</div>
				  		<div class="col-lg-10 recent-info-txt">
				  			<span class="recent-user-name">Priyadarshini Jayakumar</span> likes Bejoya Raphel's photo.
				  		</div>
  	        </div>
  	        <div class="row" id="recent-box">
				  		<div class="col-lg-2">
				  			<img src="<?php echo base_url();?>common/images/profile_pictures/thumb/12.jpg" alt="">
				  		</div>
				  		<div class="col-lg-10 recent-info-txt">
				  			<span class="recent-user-name">Priyadarshini Jayakumar</span> likes Bejoya Raphel's photo.
				  		</div>
  	        </div>
  	        <div class="row" id="recent-box">
				  		<div class="col-lg-2">
				  			<img src="<?php echo base_url();?>common/images/profile_pictures/thumb/12.jpg" alt="">
				  		</div>
				  		<div class="col-lg-10 recent-info-txt">
				  			<span class="recent-user-name">Priyadarshini Jayakumar</span> likes Bejoya Raphel's photo.
				  		</div>
  	        </div>
  	        
  	</div>
  	</div>
  	
  </div>
  </div>
  </div>
  
</div>

						
		</div>
					

</div>

