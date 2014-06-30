

 var FindRideModel = Backbone.Model.extend({
       initialize: function(){}, 
});

  var FilterRideModel = Backbone.Model.extend({
       initialize: function(){}, 
});

    var FilterByGender = Backbone.Model.extend({
       initialize: function(){}, 
});

var RideCollection = Backbone.Collection.extend({  
    model : FindRideModel,
    url: "/car/go2gether/index.php/home/test"
});

var FilterRideCollection = Backbone.Collection.extend({  
    model : FilterRideModel,
    url: "/car/go2gether/index.php/home/CostRangeFilter"
});

var FilterByGenderCollection = Backbone.Collection.extend({  
    model : FilterByGender,
    url: "/car/go2gether/index.php/home/FilterByGender"
});



var Ride = new RideCollection; 
var RideFilter=new FilterRideCollection;
var GenderFilter=new FilterByGenderCollection;



var UserlistView=Backbone.View.extend({
  el: $('body'),

  initialize:function () {
        console.log('Initializing find ride View');

        
  },
  events: {
          "click #find_ride_btn": "find_rides",
          "slidechange #slider-range" : "updateVal" ,
          "click #find_ride_btn" :"viewRideDetails",
           "click input[type=radio]" :"FilterByGender"
  },
  render:function(){

  		var that=this;
       var form_data = $("#findRide").serialize();
       Ride.fetch({ data: form_data,
                   type:'POST',
                   success: function (user) {
                              var template=_.template($('#riders-list-template').html(),{riderList:Ride.models})
                             $('#rides-lists').html(template);

                             var $container = $('.isotope').isotope({
                                itemSelector: '.element-item',
                                layoutMode: 'fitRows',
                                transitionDuration: '0.6s'
                              }); 

                          }
      });


	},
  FilterByGender:function(event){
    //console.log(this.$el.find('input[name="gender"]:checked').val());
           var Data='gender='+this.$el.find('input[name="gender"]:checked').val();
           GenderFilter.fetch({ data: Data,
                   type:'POST',
                   success: function (data) {

                              var template=_.template($('#riders-list-template').html(),{riderList:GenderFilter.models})
                             $('#rides-lists').html(template);
                            $('.isotope').isotope('reloadItems').fadeIn().isotope();
                          }
      }); 
    

  },
  find_rides:function(event){
      event.preventDefault();
      var form_data = $("#findRide").serialize();

     
      Ride.fetch({ data: form_data,
                   type:'POST',
                   success: function (user) {
                              var template=_.template($('#riders-list-template').html(),{riderList:Ride.models})
                             $('#rides-lists').html(template);
                          }
      });  
   
    
  },
  updateVal:function(e,ui){
         // console.log( ui.values[0] + ',' + ui.values[1]);

          var RangefilterData='minVal='+ui.values[0]+'&maxVal='+ui.values[1];
           RideFilter.fetch({ data: RangefilterData,
                   type:'POST',
                   success: function (user) {
                              var template=_.template($('#riders-list-template').html(),{riderList:RideFilter.models})
                             $('#rides-lists').html(template);
                              $('.isotope').isotope('reloadItems').fadeIn().isotope();
                          }
      });  

  },


});




var Router=Backbone.Router.extend({
  routes:{
  	'':'home'
  }
});




var userlist=new UserlistView();


var router=new Router();
router.on(
   'route:home',function(){
   		userlist.render();
   });
Backbone.emulateHTTP = true;
Backbone.emulateJSON = true
Backbone.history.start();