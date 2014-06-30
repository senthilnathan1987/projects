<input type="hidden" id="base_url" name="base_url" value="<?php echo base_url(); ?>" />
<script src="<?php echo base_url(); ?>common/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo base_url(); ?>common/js/plugins/jquery.uniform.min.js"></script>
<script src="<?php echo base_url(); ?>common/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>common/js/plugins/jquery.qrcode.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/jquery.mCustomScrollbar.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/jquery.isotope.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/responsiveslides.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/jquery.easytabs.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/jquery.oembed.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/ajaxupload.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/jquery.fancybox.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/webcam/webcam.js"></script>
	
	<script src="<?php echo base_url(); ?>common/js/functions.js"></script>

	<script type="text/javascript">
	
	jQuery(document).ready(function(){
		
		var $post_container = jQuery('#post-list-container');
		// add randomish size classes
     
         $post_container.find('.element').each(function(){
		 $post_container.isotope({
          itemSelector : '.element',
         });
        });
		
		
		
		$('.fancybox').fancybox();
		

		var qrcode_content=jQuery('#qrcode_content').html();
		jQuery('#qrcode').qrcode({width: 80,height: 80,text: qrcode_content});
		
		//$('.change_profile_toggle').hide();
		
		/*****profile pic chnage button effect *******/
		//$('#profile_pic').hover(function(){
			//$('.change_profile_toggle').toggle();
		//});
		
		
		
		
		/***** friends list thumb scroll in profile page ********/
		jQuery('#friends-thumbs-list,#recent-activities-list').mCustomScrollbar({
			 advanced:{
        updateOnContentResize: true
    },
			scrollButtons:{
						enable:true
					},
					
					scrollInertia: 500,
					autoHideScrollbar: true
		});
		
		
		
		$('.styled').uniform({ radioClass: 'choice' } );
		
		
		if($('#message').children().find('i').hasClass('new-message'))
		{
			
			$('#message').addClass('notify');
		}
		if($('#notification').children().find('i').hasClass('new-notifi'))
		{
			
			$('#notification').addClass('notify');
		}
		
		
		
		
		
		
		
		 jQuery("a.oembed").oembed(
		 	null, 
                        {
                        embedMethod: "append", 
                        maxWidth: 1024,
                        maxHeight: 768,
                        vimeo: { autoplay: false, maxWidth: 200, maxHeight: 200}                 
                        }
		
		 );
		
	
		
		
		 // Slideshow 4
      jQuery("#slider4").responsiveSlides({
        auto: false,
        pager: false,
        nav: true,
        speed: 500,
         namespace: "callbacks",
      });
		
		
		
		var win_width=jQuery(window).width();
		
		var pixel=win_width*(18/100);
		
		var left_panel=pixel-win_width;
		jQuery('.menu-panel').css('left',left_panel);
		

		
	 $('.actions').easytabs({
	 	animationSpeed: 300,
		collapsible: false,
		tabActiveClass: "current"
	 });
		
		
		$('.aboutUs_toggle').click(function(){
			
			$('.menu-panel').toggleClass('fullpage');
		});
		
		
		$('#example').tooltip();
		
		
		
		
		

		var $container = jQuery('#friends-container');
		// add randomish size classes
     
         $container.find('.element').each(function(){
		 $container.isotope({
        itemSelector : '.element',
         });
        });
        
      
      $('#fillter_friends li a').click(function(){
			$this=$(this);
			
			 var $optionSet = $this.parents('#fillter_friends');
			 var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
	        // parse 'false' as false boolean
	        value = value === 'false' ? false : value;
	        
	        
	        
	        options[ key ] = value;
	        
	       
	        
	        $container.isotope( options );
	              
              
			   
		});
		
		
     
       
      
		

		var win_height=jQuery(window).height();
		var con_height=jQuery('#post-list-container').height();
		
		var comments_height=jQuery('#comments-continer').height();
		var img_holder_height=jQuery('.img_holder').height();
		
	
		
		if(comments_height>img_holder_height){
		jQuery('.comments-list-continer').mCustomScrollbar({
			 advanced:{
        updateOnContentResize: true
    },
			scrollButtons:{
						enable:true
					},
					set_height: (img_holder_height-40),
					scrollInertia: 500,
					autoHideScrollbar: true
		});
		}
		
		
		if(con_height>win_height){
			
		jQuery("#post-list-container,#post-right-container-height,.about-container").mCustomScrollbar({
			 advanced:{
        updateOnContentResize: true
    },
					scrollButtons:{
						enable:true
					},
					set_height: (win_height-51),
					scrollInertia: 500,
					autoHideScrollbar: true
				});
		}
		
		
		
		
	});
	</script>
</body>
</html>