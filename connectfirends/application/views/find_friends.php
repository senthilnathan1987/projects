
<div class="profile-content">
	

			<div class="menu-panel">
				
				<?php $this->load->view('about_panel'); ?>
			</div>
			
	     
	     <div class="bb-custom-wrapper">
	     	 <div class="row ">
	     	 	<div class="col-12 friends_search_bar" >
	     	 		
	     	 		<div class="row ">
	     	 			<div class="col-6 ">
	     	 		
	     	 		<div class="search-icon">
	     	 			<i class="icon-search"></i>
	     	 		</div>
	     	 		<div class="search-field">
	     	 			<input type="text" name="search-friends" class="search-friends-field" placeholder="Search friends..."/>
	     	 			
	     	 		</div>
	    
	     	 		</div>
	     	 		<div class="col-6 ">
	     	 		<div class="btn-group pull-right friends-shorting">
					          <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
					           Filtter Friends <span class="caret"></span>
					          </button>
					          <ul class="dropdown-menu" id="fillter_friends" data-option-key="filter">
					          	<li><a href="#filter" data-option-value="*">All friends</a></li> 
					             <li><a href="#filter" data-option-value=".<?php echo ( $query_user_details[0]->school); ?>">School(<?php echo $query_school_count; ?>) [<?php echo ( $query_user_details[0]->school); ?>]</a></li>
					            <li><a href="#filter" data-option-value=".<?php echo ( $query_user_details[0]->high_school); ?>">High school (<?php echo $query_high_school_count; ?>) [<?php echo ( $query_user_details[0]->high_school); ?>]</a></li>
					            <li><a href="#filter" data-option-value=".<?php echo ( $query_user_details[0]->company); ?>">Colleagues (<?php echo $query_company_count;?>) [<?php echo ( $query_user_details[0]->company); ?>]</a></li>
					         
					          </ul>
					        </div>
	     	 		</div>
	     	 		</div>
	     	 		
	     	 	</div>
	     	 	</div>
	       <div class="row " id="friends-container">
	       	
	       	<?php
  	               foreach($users_query as $row){ ?>
		        <div class="col-6 col-lg-4 friends-box element <?php echo $row->school; ?> <?php echo $row->high_school; ?> <?php echo $row->company; ?>" >
		        	
		        	<div class="row">
            <div class="col-lg-2"><a  href='<?php echo base_url(); ?>index.php/profile/user/<?php echo $row->uid; ?>'><img class="friends-thumb-img" width="100%" src="<?php echo $row->medium_img_path; ?>"  /></a></div>
            <div class="col-lg-10">
            	<div class="txt-area">
            		<a  href='<?php echo base_url(); ?>index.php/profile/user/<?php echo $row->uid; ?>'><?php echo $row->fname;?><?php echo $row->lname;?></a>
            		
            		
            		
            		<?php if($session_user_id == $row->user_id){?>
            		<button type="button" class="btn btn-success btn-xs pull-right add_friend_btn" id="<?php echo $row->uid; ?>"><i class="icon-ok" style="padding-right:6px"></i>Friend request sent</button>
            		<?php }else{ ?>
            		<button type="button" class="btn btn-primary btn-xs pull-right add_friend_btn" id="<?php echo $row->uid; ?>"><i class="icon-plus"></i>Add as friend</button>
            		<?php } ?>
                </div>
            	
            	
            </div>
          </div>
		        	
		        </div>
		       <?php }
				   ?>
		        
		       
		        
           </div>
     		
		</div>
					

</div>

