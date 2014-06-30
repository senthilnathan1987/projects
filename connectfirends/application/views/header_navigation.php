<body>
	<div id="top">
		<div class="fixed">
			<a href="index.html" title="" class="logo">Connect Friends</a>
			
			<?php if($this->session->userdata('validated')==TRUE){
				
			 ?> 
			
			
			<ul class="top-menu">
				<li><a class="fullview" href="<?php echo base_url() ?>index.php/profile"><i class="icon-user"></i>My profile</a></li>
				<li id="message"><a class="showmenu"><i class="new-message"></i><i class="icon-envelope"></i> Message</a></li>
				<li id="notification" class="dropdown">
					<a class="user-menu" data-toggle="dropdown">
						<?php if($query_notifications==null){}else{?>
						<i class="new-notifi"></i>
						<?php }?>
						
						<i class="icon-exclamation-sign"></i>Notifications</span>
					</a>
					<?php
						
						if($query_notifications==null){
							
						}else{
							
						?>
						
					<ul class="dropdown-menu  pull-right friends_notifications">
						
						
						<?php
						
  	                       foreach($query_notifications as $row){ ?>
						
						<li class="notifi_<?php echo $row->tbl_fid;?>">
							<div class="notification-dd">
								<a href="<?php echo base_url(); ?>index.php/profile/user/<?php echo $row->uid; ?>"><img src="<?php echo base_url();?>common/images/profile_pictures/thumb/12.jpg" width='40' height='40' /></a>
							</div>
							<div class="notification_username_conainer">
								<?php echo $row->username;?>
							</div>
							<div class="notification_btn_conainer">
								<button type="button" id="<?php echo $row->tbl_fid;?>" friendid='<?php echo $row->friend_id; ?>' userid='<?php echo $row->uid; ?>' class="btn btn-primary btn-xs notifi_confirm_btn">Confirm</button>
								<button type="button" id="<?php echo $row->tbl_fid;?>" class="btn btn-danger btn-xs">Deny</button>
							</div>
							
							
						</li>
						
						<?php
						   }
						
						   ?>
						
						
						
					</ul>
					<?php
						   }
						
						   ?>
				</li>
				<li><a href="<?php echo base_url() ?>index.php/find_friends" title="" class="messages"><i class="icon-exclamation-sign"></i>Find Friends</a></li>
				<li><a href="<?php echo base_url() ?>index.php/home/do_logout" title="" class="messages"><i class="icon-signout"></i>Logout</a></li>
				
			</ul>
			
			<?php }else { } ?>
			
			
		</div>
	</div>
		</div>
