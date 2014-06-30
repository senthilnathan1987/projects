! function($) {

	$(function() {

		var base_url = $('#hidden_site_url').val();
		
		
		
		
		$('.unread').click(function(){
			var msgId=$(this).attr('data-msg-id');
			$.ajax({
							url : base_url + "/dashboard/message_details",
							type : 'POST',
							dataType: "json",
							data : "msgId="+msgId,
							beforeSend : function() {
			
							},
							success : function(data, textStatus, xhr) {
								
								console.log(data);
								$('#fromMailId').html(data[0].personal_fname);
								$('#MailSubject').html(data[0].subject);
								$('#mobileNumber').html(data[0].personal_mobile);
								$('#message_description').html(data[0].message_desc);
								
								
							},
							error : function(xhr, textStatus, errorThrown) {
								alert('ajax error');
							}
						});
			
		});
		
		
		
		 $("#check_all").change(function() {
	      var inputs  = $("input[type='checkbox']");
	      if ( $(this).is(":checked") ) {
	        inputs.prop( "checked", true );
	        // inputs.attr( "checked", true ); // if its not working
	      }
	      else {
	        inputs.removeAttr( "checked" );
	      }
	    });
	    
	    
		
		//delete messages
		$('.msg_delete_btn').click(function(){
			
			var checked = $("input[name='need_delete[]']:checked").length;
			if ( checked == 0 ) {
		        alert( "Please select a messages to delete" );
		        return false;
		      }else{
		      	 for(var i = 0; i < checked; i++) {
		      	 	
		      	 	 var id = $("input[name='need_delete[]']:checked")[i].getAttribute("id");
		      	 	 
		      	 	  $('#msg_row_'+id).fadeOut();
		      	 	 
		      	 		$.ajax({
							url : base_url + "/dashboard/delete_message",
							type : 'POST',
							data : "message_id="+id,
							beforeSend : function() {
			
							},
							success : function(data, textStatus, xhr) {
								
								
								
							},
							error : function(xhr, textStatus, errorThrown) {
								alert('ajax error');
							}
						});
		      	 }
		      	
		      }
		});
		
		
		//sent a message to the driver
		$('#send-message').click(function(){
			
			var from=$('#hidden-user-id').val();
			var to=$('#hidden-offer-user-id').val();
			var subject=$('#subject').val();
			var message=$('#message').val();
			
			if(subject==""){
				$('#subject').addClass('input-error');
				return false;
			}else{
				$('#subject').removeClass('input-error');
			}
			
			if(message==""){
				$('#message').addClass('input-error');
				return false;
			}else{
				$('#message').removeClass('input-error');
			}
			
			
			
			$.ajax({
				url : base_url + "/view_offer/send_message",
				type : 'POST',
				data : "from="+from+"&to="+to+"&subject="+subject+"&message="+message,
				beforeSend : function() {

				},
				success : function(data, textStatus, xhr) {
					alert(data);
					
				},
				error : function(xhr, textStatus, errorThrown) {
					alert('ajax error');
				}
			});
			
			
		});
		
		
		
		//validate user email already register or not
		$('.registration-email').focusout(function() {
            
            $.ajax({
				url : base_url + "/auth/validateEmail",
				type : 'POST',
				data : "email="+$(this).val(),
				beforeSend : function() {

				},
				success : function(data, textStatus, xhr) {
					
					if(data!=1){
						
						$('.email-feedback').removeClass('has-success');
						$('.glyphicon-ok').hide();
						
						$('.emailAvailableError').show();
						$('.email-feedback').addClass('has-error');
						$('.glyphicon-remove').show();
						  
					}else{
						$('.emailAvailableError').hide();
						$('.email-feedback').removeClass('has-error');
						$('.glyphicon-remove').hide();
						
						
						$('.email-feedback').addClass('has-success');
						$('.glyphicon-ok').show();
					}
					
				},
				error : function(xhr, textStatus, errorThrown) {
					alert('ajax error');
				}
			});
            
        });
		
		
		
		// validation for registration form
		$('.signupBtn').click(function(e){
			
			
			var password=$('.reg-password').val();
			var cpassword=$('.reg-cpassword').val();
			if(password!=cpassword){
				$('.passNotMatch').show();
				$('.reg-password').addClass('input-error');
				$('.reg-cpassword').addClass('input-error');
				return false;
			}else{
				$('.passNotMatch').hide();
				$('.reg-password').removeClass('input-error');
				$('.reg-cpassword').removeClass('input-error');
			}
			
			
			if($('#email-feedback').hasClass('has-error')){
				return false;
			}else{
			
			function clearError(oInput){
				oInput.removeClass('input-error');
			}
			
			$('#signupForm').find('input').each(function(){
				
				 if($(this).attr('data-vreq')!="" && $(this).attr('data-vreq')!=undefined){
				 	    if($(this).val()=="" || $(this).val()==null ){
				 	    	$(this).addClass('input-error');
				 	    	e.preventDefault();
				 	    }else{
				 	    	clearError($(this));
				 	    }
				 	
				 }
				
			});
			}
			
		});
		
		
		// validation for step1 ride offer
		$('#offer-nextBtn').click(function(e){
			
			function clearError(oInput){
				oInput.removeClass('input-error');
			}
			
			$('#offerRideForm').find('input').each(function(){
				
				 if($(this).attr('data-vreq')!="" && $(this).attr('data-vreq')!=undefined){
				 	    if($(this).val()=="" || $(this).val()==null ){
				 	    	$(this).addClass('input-error');
				 	    	e.preventDefault();
				 	    }else{
				 	    	clearError($(this));
				 	    }
				 	
				 }
				
			});
			
		});
		
		// validation for step2 ride offer
		$('.offer-publishBtn').click(function(e){
			
			
			function clearError(oInput){
				oInput.removeClass('input-error');
			}
			
			if($(".certify-checkbox").prop('checked') ){
			
			$('#offerRideForm').find('input').each(function(){
				
				 if($(this).attr('data-vreq')!="" && $(this).attr('data-vreq')!=undefined){
				 	    if($(this).val()=="" || $(this).val()==null || $(this).val()<=0 ){
				 	    	$(this).addClass('input-error');
				 	    	e.preventDefault();
				 	    	
				 	    }else{
				 	    	clearError($(this));
				 	    }
				 	
				 }
				
			});
			}else{
				alert('You must certify holding a driving license and valid car insurance to be able to publish your ride offer');
				e.preventDefault();
			}
			
		});
		
		
		
		
		//update car details
		$('.carUpdateBtn').click(function(){
			var form_data = $("#mycar_info_form").serialize();
			
			$.ajax({
				url : base_url + "/dashboard/update_user_car_details",
				type : 'POST',
				data : form_data,
				beforeSend : function() {

				},
				success : function(data, textStatus, xhr) {
					$('#carDetailUpdateSuccess').show();
					
				},
				error : function(xhr, textStatus, errorThrown) {
					alert('ajax error');
				}
			});
		});
		
		
		//delete offer button
		$('.delete-offer-btn').on('click',function(){
			var r=confirm("Are you sure you need to delete this ride ?");
			if (r==true)
			  {
			  var offerId=$(this).attr('data-offerId');
			$.ajax({
				url : base_url + "/dashboard/deleteOffer",
				type : 'POST',
				data : "OfferId="+offerId,
				beforeSend : function() {

				},
				success : function(data, textStatus, xhr) {
					$('#offers-row-'+offerId).fadeOut();
					$('#offerDeletedAlert').show();
					
				},
				error : function(xhr, textStatus, errorThrown) {
					alert('ajax error');
				}
			});
			  }
			else
			  {
			
			  }
			
			

		});
		
		
		//update personal infromation 
			$('.personalUpdateBtn').click(function() {
			var form_data = $("#personal_info_form").serialize();

			$.ajax({
				url : base_url + "/dashboard/update_personal_info",
				type : 'POST',
				data : form_data,
				beforeSend : function() {

				},
				success : function(data, textStatus, xhr) {
					alert(data);
					
				},
				error : function(xhr, textStatus, errorThrown) {
					alert('ajax error');
				}
			});

		});
		
		
		//update Preference
			$('.preferenceUpdateBtn').click(function() {
			var form_data = $("#preference_form").serialize();

			$.ajax({
				url : base_url + "/dashboard/preference",
				type : 'POST',
				data : form_data,
				beforeSend : function() {

				},
				success : function(data, textStatus, xhr) {
					alert(data);
					
				},
				error : function(xhr, textStatus, errorThrown) {
					alert('ajax error');
				}
			});

		});
		
		
		//update user profile picture
		 $('#profile_pic_form').submit(function(e) {
        e.preventDefault();
        $.ajaxFileUpload({
            url             :base_url+'/upload/upload_file/', 
            secureuri       :false,
            fileElementId   :'userfile',
            dataType        : 'json',
            
            success : function (data, status)
            {
               console.log(data);
              $('.profile_img').attr('src','http://localhost:8081/car/go2gether/upload/'+data.filename);
            },
            error: function (data, status, e){
            	alert('error in uploading file');
            }
        });
        return false;
    });
		
		
		
		
		
		
		$("input[name='price']").TouchSpin({
        min: 0,
        max: 1000000000,
        prefix: 'Rs',
         buttondown_class: "btn btn-danger",
        buttonup_class: "btn btn-danger"
       });
       
       $("input[name='passanger']").TouchSpin({
        min: 0,
        max: 100,
         buttondown_class: "btn btn-danger",
        buttonup_class: "btn btn-danger"
       });
		

		$('.dobPicker').datetimepicker({
			pickTime : false
		});

		/*** offer-ride js ****/
		$('#roundTrip').click(function() {
			$(".returnDatePicker").toggle(this.checked);
		});

		
		

		//login container toogle
		$('#LoginBtn').click(function() {
			$('.loginContainer').slideToggle(300);
		});

		//map in view offer container toogle
		$('.show_map').click(function() {
			$('.module-map').slideToggle(300);
		});


		//Registration modal popup data process
		/*
		$('.signupBtn').click(function() {
					var form_data = $("#signupForm").serialize();
		
					$.ajax({
						url : base_url + "/auth/register",
						type : 'POST',
						data : form_data,
						beforeSend : function() {
		
						},
						success : function(data, textStatus, xhr) {
		
							if(data==1){
								$('.signupContainer').hide();
								$('.register-step1').fadeIn();
								
							}
						},
						error : function(xhr, textStatus, errorThrown) {
							alert('ajax error');
						}
					});
		
				});*/
		
		
		
		
		//Login form  data process
		$('.loginBtn').click(function() {
			var form_data = $("#loginForm").serialize();

			$.ajax({
				url : base_url + "/auth/login",
				type : 'POST',
				data : form_data,
				beforeSend : function() {

				},
				success : function(data, textStatus, xhr) {
					if(data==1){
						location.reload();
					}else{
						$('.login-fail').show();
					}
					
				},
				error : function(xhr, textStatus, errorThrown) {
					alert('ajax error');
				}
			});

		});
		

	});

}(jQuery)
