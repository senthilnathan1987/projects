// Filename: main.js

// Require.js allows us to configure shortcut alias
// There usage will become more apparent further along in the tutorial.
require.config({
  paths: {
  	async: 'libs/require/async',
    jquery: 'libs/jquery/jquery',
    jqueryUI: 'libs/jquery/jquery-ui.min',
    underscore: 'libs/underscore/underscore-min',
    backbone: 'libs/backbone/backbone-min',
    timepicker:'jquery-ui-timepicker-addon',
    bootstrap: 'libs/bootstrap/bootstrap.min',
    bootstrapTimePicker: 'libs/bootstrap/bootstrap-datetimepicker.min',
    isotope: 'libs/jquery/isotope',
    boilerplate: 'boilerplate'
  }

});



require(['jquery', 'isotope'], function($) {
    $(function () {
        $('#container').isotope({
            itemSelector: '.element'
        });
    });

 });


