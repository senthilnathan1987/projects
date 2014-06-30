<!-- search nav bar -->
<div class="navbar navbar-inverse searchnavbar">
	<div class="container">
		<form class="form-horizontal" role="form" method="POST" action="" id="findRide">
		<div class="">
			<div class="col-lg-4">
				
					<div class="input-group ">
						<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker red"></span></span>
						<input type="text" name="start-input"  id="start-input" class="form-control" placeholder="From" value="<?php echo $departure_point; ?>">
					</div>
				
			</div>
			<div class="col-lg-4">
				
					<div class="input-group ">
						<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker green"></span></span>
						<input type="text" name="end-input" id="end-input" class="form-control"  placeholder="To" value="<?php echo $arrival_point; ?>"> 
					</div>
				
			</div>
			
					<div class="col-lg-2">
							<div class="input-group ">	
									<input data-vreq="req" autocomplete="off" type="text" class="form-control" name="rideDate" id="datePick" data-format="dd/MM/yyyy" placeholder="dd/MM/yyyy" value="<?php echo $rideDate; ?>">
							</div>
							</div>
			<div class="col-lg-1">
				<div class="btn-wrapper">
					<button type="submit" class="btn btn-primary" name="searchOffers" id="find_ride_btn">
						Find Rides
					</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="" style="height:100%;">
	<div class="col-lg-3">
		<div class="leftBlock">
            <p>
			  <label for="amount">Price range:</label>
			  <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
			</p>
			<div id="slider-range"></div>
			<p>
			 	<label for="gender">Gender:</label>
			 	<input type="radio" name="gender" value="male">male
			 	<input type="radio" name="gender" value="female">Female
			 	<input type="radio" name="gender" value="all">All
			</p>
 

		 </div> 

	</div>
	<div class="col-lg-9" style="height:100%;">
		  <div class="isotope" id="rides-lists"></div>
	</div>
</div>



   <script type="text/template" id="riders-list-template">

   <% console.log(riderList) %>

   <%_.each(riderList,function(item){ %>

   	<% console.log(item) %>

   			<div class="element-item" data-category="">
   								<a href="#" class="pull-left mg-r-md">
                                   <img src="<?php echo base_url(); ?>upload/<%= item.attributes.profile_pic %>" class="avatar avatar-sm img-circle" alt="">
                                </a>
                                <div>
                                    <span class="profile-name"><%= item.attributes.personal_fname %></span>
                                </div>
                                
                                <p class="mg-t-xs">
                                   <span class="label label-primary"><%= item.attributes.ride_departure %></span> -> <span class="label label-success"><%= item.attributes.ride_arrival %></span>
                                              
                                </p>
                                <div class="well well-sm"> Departure Date:<%= item.attributes.ride_pick_date %></div>

                               
                  
             </div>
  <% }); %>


   </script>

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
<script  type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/libs/bootstrap/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-ui-sliderAccess.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/libs/bootstrap/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/libs/bootstrap/bootstrap.touchspin.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/googlemap.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.raty.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/ajaxfileupload.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/application.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/libs/jquery/isotope.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/libs/underscore/underscore-min.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/libs/backbone/backbone-min.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/app.js"></script>
 <script>
  $(function() {

   




    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 0, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "Rs" + ui.values[ 0 ] + " - Rs" + ui.values[ 1 ] );

      }
    });

    $( "#amount" ).val( "Rs" + $( "#slider-range" ).slider( "values", 0 ) +
      " - Rs" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>



</body>
</html>
