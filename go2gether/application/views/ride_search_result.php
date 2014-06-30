<!-- search nav bar -->
<div class="navbar navbar-inverse searchnavbar">
	<div class="container">
		<form class="form-horizontal" role="form" method="POST" action="<?php echo site_url("home/find_ride_result"); ?>" id="findRide">
		<div class="row">
			<div class="col-lg-4">
				
					<div class="input-group ">
						<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker red"></span></span>
						<input type="text"  id="start-input" name="start-input" class="form-control" placeholder="From">
					</div>
				
			</div>
			<div class="col-lg-4">
				
					<div class="input-group ">
						<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker green"></span></span>
						<input type="text" id="end-input" name="end-input" class="form-control"  placeholder="To">
					</div>
				
			</div>
			

			<div class="col-lg-1">
				<div class="btn-wrapper">
					<button type="submit" class="btn btn-primary" id="find_ride_btn">
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

<div class="row">
	<div class="col-lg-4">
		<div class="field-container odd box-1">
		sdadsas
		 </div> 

	</div>
	<div class="col-lg-8">
		<?php foreach ($result as $row)
		{?>
		<div class="field-container odd box-1">
			
			
             <div class="row">
					<div class="col-lg-2"><img src="<?php echo base_url(); ?>profile_pic/pic_blog1-2.jpg" width="100%" /></div>
					<div class="col-lg-3">
						<div class="header-fields">
               
                <div class="title-company">
                  <div class="title"><a href="job.html">Senthilnathan</a></div>
                  <div>28 year old</div>
                  <div class="rating" data-score="4"></div>
                  <div class="conditions">
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/no_chat.png" width="34" height="33" />
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/dog_allow.png" width="34" height="33" />
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/dont_smoke.png" width="34" height="33" />
                  	<img src="<?php echo base_url(); ?>assets/img/condition_icons/music.png" width="34" height="33" />
                  	
                  	</div>
                </div>
                
               
              </div>
					</div>
					<div class="col-lg-7">
						<div class="title"><a href=""><?php echo $row->ride_departure ?> -> <?php echo $row->ride_arrival ?></a></div>
					</div>
			</div>
             
             
           
              
            </div>
<?php } ?>
	</div>
</div>

