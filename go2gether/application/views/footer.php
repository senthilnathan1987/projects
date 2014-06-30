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
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-ui-timepicker-addon.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-ui-sliderAccess.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.touchspin.js"></script>
<script src="<?php echo base_url(); ?>/dist/js/fileinput.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/googlemap.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.raty.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/ajaxfileupload.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/application.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var dateToday = new Date();
		$('#datePick').datetimepicker({
			showTimepicker:false,
			 minDate: dateToday,
		});
		$('#dobdatePick').datetimepicker({
			showTimepicker:false,
			changeMonth: true,
      changeYear: true
			
		});
		$('#timePick').datetimepicker({
			timeOnly:true,
			timeFormat: "hh:mm tt"
		});
		

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

//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

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
computeTotalDistance(directionsDisplay.getDirections());
}
});
}

function computeTotalDistance(result) {
console.log(result);
var total = 0;
var myroute = result.routes[0];
for (var i = 0; i < myroute.legs.length; i++) {
total += myroute.legs[i].distance.value;
duration=myroute.legs[i].duration.text;
}
total = total / 1000.0;

document.getElementById('distance').innerHTML = total + ' km';
document.getElementById('duration').innerHTML = duration;
}

google.maps.event.addDomListener(window, 'load', initialize);

calcRoute();

});

</script>
</body>
</html>
