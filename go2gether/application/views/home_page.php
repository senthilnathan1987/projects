<body>
<link rel="shortcut icon" href="<?php echo base_url();?>/assets/ico/favicon.ico">
  <div class="container-fluid wrapper">
<?php include 'navigation.php'; ?>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    	<form class="form-horizontal" role="form" method="POST" action="<?php echo site_url("home/find_ride"); ?>" id="findRide">
      <!-- Indicators -->
     <div class="search-ride-holder-home">
     			<div class="col-lg-12">
<label for="start-input">Your departure point</label>
								<div class="input-group ">
									
									<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker red"></span></span>
									<input data-vreq="req" type="text"  id="start-input" name="start-input" class="form-control route-txt"  placeholder="">
								</div>

							</div><br />
							<div class="col-lg-12">
<label for="end-input">Your arrival point</label>
								<div class="input-group ">
									<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker green"></span></span>
									<input  data-vreq="req" type="text" id="end-input" name="end-input" class="form-control route-txt"   placeholder=" ">

								</div>
								
							</div><br />
							<div class="col-lg-6">
								<label for="timePick">Pick Date</label>
									<input data-vreq="req" autocomplete="off" type="text" class="form-control" name="rideDate" id="datePick" data-format="dd/MM/yyyy" placeholder="dd/MM/yyyy">
							</div>
							<div class="col-lg-6">
								<label >&nbsp;</label>
								<button type="submit" class="btn btn-warning pull-right" name="searchOffers" id="searchOffers">Find Rides</button>
							</div>
     </div>
      <div class="carousel-inner">
       
        <div class="item active">
          <img  src="<?php echo base_url();?>/assets/img/slider1.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h1>Share Daily Rides. Go Green. Save Money.</h1>
              <p>Connecting drivers with people travelling the same way</p>
             
            </div>
          </div>
        </div>
        
      </div>
     </form>
    </div><!-- /.carousel -->
    



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="marketing">
<div class="row">
        <div class="col-lg-3">
          <img class="img"  src="<?php echo base_url();?>/assets/img/secure.png" style="width: 140px; height: 140px;">
          <h3>Secure</h3>
          
        </div>
        <div class="col-lg-3">
          <img class="img"  src="<?php echo base_url();?>/assets/img/fuel.png" style="width: 140px; height: 140px;">
          <h3>Save fuel</h3>
          
        </div>
        <div class="col-lg-3">
          <img class="img"  src="<?php echo base_url();?>/assets/img/eco.png" style="width: 140px; height: 140px;">
          <h3>Save the planet</h3>
         
        </div>
        <div class="col-lg-3">
          <img class="img"   src="<?php echo base_url();?>/assets/img/social.png" style="width: 140px; height: 140px;">
          <h3>Social</h3>
         
        </div>
      </div>
</div>
<div class="jumbotron">
      <div class="">
        <h2>Why Use Go to gether?</h2>
        <p>It uses a unique blend of advanced search techniques and social networking to provide the most relevant results for you.</p>
        <p>
        	<ul>
		    <li>Reduce Travel Stress</li>
		    <li>Broadens Social Network</li>
		    <li>Cuts Fuel Costs</li>
		    <li>Decreases Pollution</li>
		  </ul>
        </p>
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
<div id="gmap" class="hidden"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
 <script data-main="<?php echo base_url(); ?>assets/js/main" src="<?php echo base_url(); ?>assets/js/libs/require/require.js"></script>

</body>
</html>

    