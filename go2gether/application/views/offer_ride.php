

			<!-- Marketing messaging and featurettes
			================================================== -->
			<!-- Wrap the rest of the page in another container to center all the content. -->

			<div class="row" >
				<div class="col-lg-5">
					
					
				<form class="form-horizontal" role="form" method="POST" action="<?php echo site_url("/Offer_ride"); ?>" id="offerRideForm">
					<div class="panel panel-primary offer-txt-holders">
						<div class="panel-heading">
							Route
						</div>
						<div class="panel-body">
							<div class="col-lg-12">

								<div class="input-group ">
									<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker red"></span></span>
									<input data-vreq="req" type="text"  id="start-input" name="departure" class="form-control route-txt"  placeholder="Your departure point (address, city, station...)">
								</div>

							</div>
							<div class="col-lg-12">

								<div class="input-group ">
									<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker green"></span></span>
									<input  data-vreq="req" type="text" id="end-input" name="arrival" class="form-control route-txt"   placeholder="Your arrival point (address, city, station...)">

								</div>
								<p>
									Total Distance: <span id="total"></span>
								</p>
							</div>
							<!--
							<div class="col-lg-12">
															<select multiple data-role="tagsinput" id="waypoint">
							
															</select>
							
														</div>-->
							
							
							<button type="button" class="btn btn-primary" id="getRouteBtn">
								Get your route
							</button>
							<div class="col-lg-12">
								<div id="directionsPanel"></div>
							</div>
						</div>
					</div>

					<div class="panel panel-primary offer-txt-holders dateTimeHolder">
						<div class="panel-heading">
							<div class="col-lg-6">
								Date and time
							</div>
							<!-- <div class="col-lg-6">
								<div class="checkbox" id="roundTripCheckbox">
									<label>
										<input type="checkbox" id="roundTrip" >
										Round trip </label>
								</div>
							</div> -->
						</div>
						<div class="panel-body">

							<!-- departure holder -->
							
							<div class="col-lg-6">
								<label for="timePick">Pick Date</label>
								
									<input data-vreq="req" type="text" class="form-control" name="rideDate" id="datePick" data-format="dd/MM/yyyy" placeholder="dd/MM/yyyy">
									
								
							</div>
							<div class="col-lg-6">
								<label for="timePick">Pick Time</label>
								

									<input data-vreq="req" type="text" class="form-control"  name="rideTime" id="timePick" data-format="hh:mm:ss PP" placeholder="hh:mm">
									
								
							</div>

							<!-- return trip holder -->
							<div class="returnDatePicker">
								<p>
									Return date:
								</p>
								<div class="col-lg-6">
									<label for="timePick">Pick Date</label>
									<div class="input-group nput-append date datetimepicker1" id="">
										<input type="text" class="form-control" id="datePick" data-format="dd/MM/yyyy" placeholder="dd/MM/yyyy">
										<span class="input-group-btn add-on"> <i class="btn btn-default glyphicon glyphicon-calendar"  data-time-icon="icon-time" data-date-icon="icon-calendar"></i> </span>
									</div><!-- /input-group -->
								</div>
								<div class="col-lg-6">
									<label for="timePick">Pick Time</label>
									<div class="input-group nput-append date hourPicker" id="">

										<input type="text" class="form-control" id="timePick" data-format="hh:mm:ss PP" placeholder="hh:mm:ss PP">
										<span class="input-group-btn add-on"> <i class="btn btn-default glyphicon glyphicon-time"  data-time-icon="icon-time" data-date-icon="icon-calendar"></i> </span>
									</div><!-- /input-group -->
								</div>

							</div>

						</div>
					</div>
					<button type="submit" class="btn btn-success pull-right" id="offer-nextBtn">
						Next step
					</button>
</form>
				</div>

				<div class="col-lg-7" style="height:100%;">
					<div id="gmap"></div>
				</div>
			</div>

			


			