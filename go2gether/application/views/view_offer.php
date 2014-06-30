

			<!-- Marketing messaging and featurettes
			================================================== -->
			<!-- Wrap the rest of the page in another container to center all the content. -->

			<div class="row" style="padding-left: 20px;padding-right: 15px;">
				<div class="col-lg-8">
				<header class="module-a">
					<p class="link"><a href="./"><span class="glyphicon glyphicon-chevron-left"></span></a></p>
						<h2 class="fn org"><?php echo $result->ride_departure; ?> -> <?php echo $result->ride_arrival; ?></h2>
						 
						
						<!-- <p class="addthis_toolbox "> <a href="#" class="show_map">Show map</a> </p> -->
					</header>
					
					<div class="module-map"> 
						<div id="gmap2" class=""></div> 
						<input type="hidden" name="" id="hidden_departure" value="<?php echo $result->ride_departure; ?>"/>
						<input type="hidden" name="" id="hidden_arrival" value="<?php echo $result->ride_arrival; ?>"/>
					</div>
					
					<div class="bs-example">
    <div class="panel panel-default">
      <div class="panel-body">
       <div class="bs-example bs-example-tabs">
    <ul id="myTab" class="nav nav-tabs">
      <li class="active"><a href="#trip" data-toggle="tab">Trip details</a></li>
      <!-- <li class=""><a href="#Member_activity" data-toggle="tab">Member activity</a></li> -->
     
    </ul>
    <div id="myTabContent" class="tab-content">
    
      <div class="tab-pane fade active in" id="trip">
        <p><?php echo $result->ride_description; ?></p>
        <table class="table table-bordered table-striped">
      
      <tbody>
       <tr>
         <td>Pick up point</td>
         <td><?php echo $result->ride_departure; ?></td>
       </tr>
       <tr>
         <td>Drop off point</td>
         <td><?php echo $result->ride_arrival; ?></td>
       </tr>
       <tr>
         <td>Date</td>
         <td><?php echo $result->ride_pick_date; ?></td>
       </tr>
       <tr>
         <td>Departure time</td>
         <td><?php echo $result->ride_pick_time; ?></td>
       </tr>
       <tr>
         <td>Detour</td>
         <td><?php echo $result->ride_detour; ?></td>
       </tr>
       <tr>
         <td>Schedule flexibility</td>
         <td><?php echo $result->ride_leave; ?></td>
       </tr>
       <tr>
         <td>Luggage size</td>
         <td><?php echo $result->ride_luggage_size; ?></td>
       </tr>
       <tr>
         <td>Car</td>
         <td>This event is fired when the tooltip has finished being hidden from the user (will wait for CSS transitions to complete).</td>
       </tr>
      </tbody>
    </table>
      </div>
      <div class="tab-pane fade " id="Member_activity">
        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
      </div>
   
    </div>
  </div>
      </div>
    </div>
  </div>
				</div>

				<div class="col-lg-4">
					<div class="panel panel-default right-panel">
					<div class="row">
						<div class="col-lg-6">
							<div class="seats-left">
							<span class="badge"><?php echo $result->ride_seats; ?></span> <span style="font-size: 20px;">seats left</span>
							</div>
						</div>
				<div class="col-lg-6">
					<div class="seats">
						<?php for($i=0; $i<$result->ride_seats; $i++){
							?>
							<img src="<?php echo base_url();?>/assets/img/seat.png" alt="seats">
							<?php
						} ?>
						
						
					</div>
					</div>
					</div>
					
					<div class="divider"></div>
				<span class="label label-success" style="font-size: 22px;display:block;margin-top: 0px;">Rs:<?php echo $result->ride_price; ?> per passanger</span>
				<div class="divider"></div>
				<?php if($this->tank_auth->is_logged_in()){ ?>
				<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-warning" id="ContactDriver" style="width: 100%;">Contact Driver</a>
				<?php }else{ ?>
				<a href="<?php echo site_url("home/register"); ?>" class="btn btn-warning" id="ContactDriver" style="width: 100%;">Contact Driver</a>
				<?php } ?>	
				
				
					</div>
					
				</div>
				
				<div class="col-lg-4">
					<div class="panel panel-default right-panel">
					<div class="row">
						
							
					<div class="col-lg-4">
							<?php if($result->profile_pic==''){  ?>
									<img class="profile_img" src="<?php echo base_url(); ?>profile_pic/man-profile.jpg" width="100%" />
									<?php }else{ ?>
									<img class="profile_img" src="<?php echo base_url(); ?>upload/<?php echo $result->profile_pic;  ?>" width="100%" />	
									<?php } ?>
					</div>
							
						
				<div class="col-lg-8">
					<div class="title-company">
                  <div class="title"><a href=""><?php echo $result->personal_fname; ?></a></div>
                  <div>28 year old</div>
                  <div class="rating" data-score="<?php echo $result->personal_rating; ?>"></div>
                  <div class="conditions">
                  	<?php if($result -> chat == 1){ ?>
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/chat.png" width="34" height="33" />
                  	<?php } else { ?>
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/no_chat.png" width="34" height="33" />
                  	<?php } ?>
                  	
                  	<?php if($result -> pet == 1){ ?>
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/dog_allow.png" width="34" height="33" />
                  	<?php } else { ?>
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/dog_not.png" width="34" height="33" />
                  	<?php } ?>
                  	
                  	<?php if($result -> smoke == 1){ ?>
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/smoke.png" width="34" height="33" />
                  	<?php } else { ?>
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/dont_smoke.png" width="34" height="33" />
                  	<?php } ?>
                  	
                  	<?php if($result -> music == 1){ ?>
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/music.png" width="34" height="33" />
                  	<?php } else { ?>
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/no_music.png" width="34" height="33" />
                  	<?php } ?>
                  	
                  	</div>
                </div>
					</div>
					</div>
					
					<div class="divider"></div>
				        <table class="table table-bordered table-striped">
      
      <tbody>
       <tr>
         <td>Rides offered:</td>
         <td><?php echo $offer_count_user; ?></td>
       </tr>
       <tr>
         <td>Last online:</td>
         <td><?php  echo date("F j, Y",strtotime($user_detail->last_login));?></td>
       </tr>
       <tr>
         <td>Member since:</td>
         <td><?php  echo date("F j, Y",strtotime($user_detail->created));?></td>
       </tr>
   
      </tbody>
    </table>
				
			
					</div>
					
				</div>
			</div>
			
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send a message to driver</h4>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="hidden-user-id" id="hidden-user-id" value="<?php echo $this->session->userdata('user_id'); ?>" />
      		<input type="hidden" name="hidden-user-id" id="hidden-offer-user-id" value="<?php echo $result->user_id; ?>" />
      	<div class="row">
       <div class="form-group">
									<label for="subject" class="col-sm-2 control-label">Subject</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-vreq="req" name="subject" id="subject" placeholder="Subject">
									</div>
								</div>
				</div><br />
				<div class="row">
	 <div class="form-group">
									<label for="message" class="col-sm-2 control-label">Message</label>
									<div class="col-sm-10">
										<textarea id="message" class="form-control" rows="5" name="message" placeholder="Enter your message here..."></textarea>
									</div>
		</div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="send-message" >Send message</button>
      </div>
    </div>
  </div>
</div>

			
<!-- FOOTER -->
<footer>
	<p class="pull-right">
		<a href="#">Back to top</a>
	</p>
	<p>
		&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a>
	</p>
</footer>

</div><!-- /.container -->
<input type="hidden" id="hidden_site_url" value="<?php echo site_url(); ?>" />
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url(); ?>/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.touchspin.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.raty.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/application.js"></script>
<script type="text/javascript">
			$(document).ready(function() {
		
		
		$('.rating').raty({
			readOnly: true,
			 path: '<?php echo base_url(); ?>/assets/img/rating/',
  score: function() {
    return $(this).attr('data-score');
  }
});
		
		
		
		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();
		var map;

		function initialize() {
			directionsDisplay = new google.maps.DirectionsRenderer();
			var chicago = new google.maps.LatLng(41.850033, -87.6500523);
			var mapOptions = {
				zoom : 7,
				center : chicago
			}
			map = new google.maps.Map(document.getElementById('gmap2'), mapOptions);

		

			directionsDisplay.setMap(map);
			//directionsDisplay.setPanel(document.getElementById('directionsPanel'));

			
		}

		function calcRoute() {
			
			var start = document.getElementById('hidden_departure').value;
			var end = document.getElementById('hidden_arrival').value;

		

			var request = {
				origin : start,
				destination : end,
				travelMode : google.maps.TravelMode.DRIVING
			};
			directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
					var route = response.routes[0];
					//computeTotalDistance(directionsDisplay.getDirections());
				}
			});
		}


		google.maps.event.addDomListener(window, 'load', initialize);

		calcRoute();
	
	});

</script>
</body>
</html>


			