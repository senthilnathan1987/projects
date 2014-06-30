$(function(){
	/*** global variable for base url *****/
	var base_url=$('#base_url').val();
	var spinner = $('#spinner');
	//alert(base_url);
	
	
	/******* web camera take picture js *******/
		var camera = $('#camera'),
		photos = $('#photos'),
		screen =  $('#screen');

	var template = '<a href="uploads/original/{src}" rel="cam" '
		+'style="background-image:url(uploads/thumbs/{src})"></a>';

	/*----------------------------------
		Setting up the web camera
	----------------------------------*/


	webcam.set_swf_url(base_url+'common/js/plugins/webcam/webcam.swf');
	webcam.set_api_url(base_url+"index.php/profile/camera_profile_picture");	// The upload script
	webcam.set_quality(80);				// JPEG Photo Quality
	webcam.set_shutter_sound(true, base_url+'common/js/plugins/webcam//shutter.mp3');

	// Generating the embed code and adding it to the page:	
	screen.html(
		webcam.get_html(screen.width(), screen.height())
	);
	/*----------------------------------
		Binding event listeners
	----------------------------------*/


	var shootEnabled = false;
		
	$('#shootButton').click(function(){
		if(!shootEnabled){
			return false;
		}
		$('#spinner').css('display', 'block');
		webcam.freeze();
		togglePane();
		
		return false;
	});
	$('#cancelButton').click(function(){
		webcam.reset();
		togglePane();
		return false;
	});
	$('#shoot_upload_Button').click(function(){
		webcam.upload();
		webcam.reset();
		togglePane();
		return false;
	});
	/*---------------------- 
		Callbacks
	----------------------*/
	
	
	webcam.set_hook('onLoad',function(){
		// When the flash loads, enable
		// the Shoot and settings buttons:
		shootEnabled = true;
	});
	
	
	webcam.set_hook('onComplete', function(msg){
		 $.fancybox.close();
		 $('#spinner').css('display', 'none');
		  $('#profile_img').attr('src',msg);
		  
		
		
	});
	
	
	
	// This function toggles the two
	// .buttonPane divs into visibility:
	
	function togglePane(){
		var visible = $('#camera-model .take-photo-btn:visible:first');
		var hidden = $('#camera-model .take-photo-btn:hidden:first');
		
		visible.fadeOut('fast',function(){
			hidden.show();
		});
	}
	
	
	
	
	/****** profile pc change ********/
	var button = $('.change_profile_pic_btn');
	    var spinner = $('#spinner');
		
		$(".change_profile_pic_btn").ajaxUpload({
		url : base_url+"index.php/profile/profile_pic_change",
		name: "profile_pic",
		onSubmit: function() {
		    $('#spinner').css('display', 'block');
		},
		onComplete: function(result) {
			 $('#spinner').css('display', 'none');
		  $('#profile_img').attr('src',result);
		}
		});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/***** register users ****/
	$('#registration_form').submit(function() {
		
		var email = $('#email').val();
		var re_email = $('#re_email').val();
		
		if(email==re_email){
			
		
		var values = $(this).serialize();
		//alert(values);
		
		$.ajax({
				  type: "POST",
				  url: base_url+"index.php/login/register_users",
				  data:  values 
				}).done(function( msg ) {
					
					//alert(msg);
					$('.login-wrapper').fadeIn();
		            $('.signup-wrapper').fadeOut();
		            $('.success-register').show();
					
				});
			}else
			{
				$('#email,#re_email').addClass('error-field');
			}
		
		return false;
	});
	
	
	
	
	/******* signup form change action *******/
	$('.signup').click(function(){
		
		$('.login-wrapper').fadeOut();
		$('.signup-wrapper').fadeIn();
		$('.login-error-message').hide();
	});
	
	$('.existing_account').click(function(){
		
		$('.login-wrapper').fadeIn();
		$('.signup-wrapper').fadeOut();
		
	});
	
	
	
	
	
	/***** notification confirn button ****/
	$('.notifi_confirm_btn').click(function(){
		
		var $this=$(this);
		var $notifiId=$this.attr('id');
		var $notifiId_userid=$this.attr('userid');
		var $notifiId_friendid=$this.attr('friendid');
		
		//alert('user='+$notifiId_userid+'friendid='+$notifiId_friendid);
		
		//alert($notifiId);
		$('.notifi_'+$notifiId).addClass('div_loader');
		$.ajax({
				  type: "POST",
				  url: base_url+"index.php/find_friends/notifi_confirm",
				  data: { notifiId: $notifiId, notifiId_userid:$notifiId_userid , notifiId_friendid:$notifiId_friendid }
				}).done(function( msg ) {
					$('.notifi_'+$notifiId).fadeOut();
					var $total_notify=$('.friends_notifications li:visible').size();
					
					//alert($total_notify);
					
					if($total_notify<=1){
						$('.friends_notifications').html('<li>No notifications</li>');
						$('#notification').removeClass('notify');
						$('.new-notifi').hide();
					}
					
				});
		
		
		
		return false;
	});
	
	
	/****** add as friend ******/
	$('.add_friend_btn').click(function(){
			var $this=$(this);
			var friend_id=$(this).attr('id');
			$.ajax({
				  type: "POST",
				  url: base_url+"index.php/find_friends/add_friend",
				  data: { fid: friend_id }
				}).done(function( msg ) {
					
					$this.html('<i class="icon-ok" style="padding-right:6px"></i>Friend request sent');
					$this.removeClass('btn-primary').addClass('btn-success');
					$this.removeClass('add_friend_btn').addClass('cancel_friend_request');
					
				});
			
	});
	
	
	
	/**** delete post *****/
	$('.deletePost').live('click',function(){
		var deleteId=$(this).attr('id');
		//alert(deleteId);
		$.ajax({
				  type: "POST",
				  url: base_url+"index.php/post/delete_post",
				  data: { delete_post_Id: deleteId }
				}).done(function( msg ) {
					
					$('#post_'+deleteId).fadeOut();
					
				});
		
		
		
	});
	
	
	
	
	/***** add new post ****/
	
	$('.post-btn ').click(function(){
		  var status_description=$('.status-textarea').val();
		  var hidden_id=$('#hidden_row_id').val();
		  var profile_img=$('#profile_img').attr('src');
		  
		  if(status_description==''){$('.status-textarea').addClass('error-field'); return false;}
		  
		  $('.post-loader').show();
		  
		  var text = status_description;
					text = $('<span>'+text+'</span>').text(); //strip html
					text = text.replace(/(\s|>|^)(https?:[^\s<]*)/igm,'$1<div><a href="$2" class="oembed">$2</a></div>');
					text = text.replace(/(\s|>|^)(mailto:[^\s<]*)/igm,'$1<div><a href="$2" class="oembed">$2</a></div>');
	      
		  $.ajax({
				  type: "POST",
				  url: base_url+"index.php/post/new_post",
				  data: { status_desc: status_description, location: "Boston" }
				}).done(function( msg ) {
				  
				 $('.post-loader').hide();
				$('.status-textarea').val('');
				$('.status-textarea').removeClass('error-field');
	
				  $('#post-list-container').prepend(
				  '<div class="row" id="post_'+msg+'"><div class="col-lg-12">'
				  +'<div class="news-feed-header-blue">'
				  +'<img src="'+profile_img+'" width="50" height="50" /><div class="btn-group pull-right post-actions"><a href="#"  data-toggle="dropdown"><i class="icon-chevron-down"></i></a><ul class="dropdown-menu">  <li><a href="#" class="deletePost" id="'+msg+'"><i  class="icon-trash"></i>Delete</a></li> <li><a href="#"><i class="icon-eye-close"></i>Hide this post</a></li> <li class="divider"></li> <li><a href="#">Separated link</a></li> </ul> </div></div>'
				  +'<div class="news-feed-container"><div class="media-holder"><div class="row">'
				  +'<div class="col-lg-12"><div class="col-lg-12 media no-padding">'
				  +text+'</div>'
				  +'</div></div></div></div>'
												
				  );
				  jQuery(".oembed").oembed(
						null, 
                        {
                       
                        maxWidth: 1024,
                        maxHeight: 768,
                        vimeo: { autoplay: false, maxWidth: 200, maxHeight: 200}                 
                        }
					);			
				  
				});
						  
	});
	
	
});