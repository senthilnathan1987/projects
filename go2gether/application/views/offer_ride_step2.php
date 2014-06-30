<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="row">
	<div class="col-lg-5">
		<form class="form-horizontal" role="form" method="POST" action="<?php echo site_url("/offer_ride/publish_ride"); ?>" id="offerRideForm">
			<div class="panel panel-primary offer-txt-holders">
				<div class="panel-heading">
					Price per passanger:
				</div>
				<div class="panel-body">
					<div class="well">
						<h5><?php echo $ride_departure; ?> <i class="glyphicon glyphicon-arrow-right"></i> <?php echo $ride_arrival; ?></h5>

					</div>

					
						<div class="form-group price-holder">
							<label for="demo2" class="col-md-4 control-label">Price</label>
							<input data-vreq="req" id="price" type="text" value="0" name="price" class="col-md-8 form-control">
						</div>
				

				</div>
			</div>
			<div class="well">

				<div class="form-group price-holder" id="passangerCount">
					<label for="demo2" class="col-md-7 control-label" style="padding-top: 10px;">Number of seats offerd</label>
					<input id="passanger" data-vreq="req" type="text" value="0" name="passanger" class="col-md-8 form-control">
				</div>

			</div>
			<div class="panel panel-primary offer-txt-holders">
				<div class="panel-heading">
					Other details
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<textarea class="form-control" rows="3" name="rideDesc" placeholder="Please provied some details about the trip.Your contact details (mobile number & email) already appear in your profile, please do not add them here!"></textarea>
						</div>
					</div>
					<br />

					<div class="row">
						<div class="col-lg-5">
							Maximum luggage size:
						</div>
						<div class="col-lg-5 pull-right">
							<select class="form-control" name="luggageSize">
								<option value="SMALL">Small</option>
								<option value="MIDDLE">Medium</option>
								<option value="BIG">Big</option>
							</select>

						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-lg-5">
							I will leave:
						</div>
						<div class="col-lg-5 pull-right">
							<select class="form-control" name="rideLeave">
								<option value="ON_TIME">Right on time</option>
								<option value="FIFTEEN_MINUTES">In a 15 minute window</option>
								<option value="THIRTY_MINUTES">In a 30 minute window</option>
								<option value="ONE_HOUR">In a 1 hour window</option>
								<option value="TWO_HOURS">In a 2 hour window</option>
							</select>

						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-lg-5">
							I can make a detour:
						</div>
						<div class="col-lg-5 pull-right" >
							<select class="form-control" name="detour">
								<option value="NONE">None</option>
								<option value="FIFTEEN_MINUTES" >15 minute detour, max.</option>
								<option value="THIRTY_MINUTES">30 minute detour, max.</option>
								<option value="WHATEVER_IT_TAKES">Anything is fine</option>
							</select>

						</div>
					</div>

				</div>
			</div>
			
			<div class="well">

				<div class="checkbox">
			  <label>
			    <input type="checkbox" data-vreq="req" value="1" class="certify-checkbox">
			   
                    I hereby certify that I hold a driving licence and valid car insurance 
			  </label>
			</div>

			</div>
			
			<button type="submit" class="btn btn-success pull-right offer-publishBtn">
				Publish your ride
			</button>
		</form>
	</div>

	<div class="col-lg-7">
		<div id="gmap2" ></div>
		<div class="panel panel-primary offer-txt-holders">
				<div class="panel-heading">
					Route details
				</div>
				<div class="panel-body">
					
					<div class="well">
						<p><b>Trip:</b> <?php echo $ride_departure; ?> <i class="glyphicon glyphicon-arrow-right"></i> <?php echo $ride_arrival; ?></p>
						<p><b>Distance:</b> <span id="distance"> </span></p>
						<p><b>Duration:</b> <span id="duration"> </span></p>
<input type="hidden" name="" id="hidden_departure" value="<?php echo $ride_departure; ?>"/>
<input type="hidden" name="" id="hidden_arrival" value="<?php echo $ride_arrival; ?>"/>
					</div>

					

				</div>
			</div>
	</div>
</div>

