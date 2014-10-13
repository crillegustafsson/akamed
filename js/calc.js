      function calculateRoute(from, to, datepicker, platser, bes) {
        // Center initialized to Naples, Italy
        console.log(datepicker + " " + platser + " " + bes);
        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(40.84, 14.25),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
 
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        
        console.log();

        directionsService.route(
          directionsRequest,
          function(response, status)
          {

    var data = {};
    //var w=[],wp;
    var rleg = response.routes[0].legs[0];
   data.start = {'lat': rleg.start_location.lat(), 'lng':rleg.start_location.lng()}
    data.end = {'lat': rleg.end_location.lat(), 'lng':rleg.end_location.lng()}

    startLat = data.start.lat;
    startLong = data.start.lng;
    endLat = data.end.lat;
    endLong = data.end.lng;

    skicka();


function skicka(){

      $.ajax({
        "url":"sendToDb.php",
        "type":"POST",
        "data":{
         //"dataStart" : start,
         //"dataEnd" : end
        //  "insert" : "insert",
          "startLat":startLat, 
          "startLong":startLong,
          "endLat":endLat,
          "endLong":endLong
        },
        "dataType":"JSON"
        }).done(function(data){
          console.log(data);  
        });


}



  


            if (status == google.maps.DirectionsStatus.OK)
            {
              new google.maps.DirectionsRenderer({
                map: mapObject,
                directions: response
              });

             // ajax();
            }
            else
              $("#error").append("Unable to retrieve your route<br />");
          }
        );
      }
 
      $(document).ready(function() {

        //datepicker 
      

        //slut på datepicker
        // If the browser supports the Geolocation API
        if (typeof navigator.geolocation == "undefined") {
          $("#error").text("Your browser doesn't support the Geolocation API");
          return;
        }
 
        $("#from-link, #to-link").click(function(event) {
          event.preventDefault();
          var addressId = this.id.substring(0, this.id.indexOf("-"));
 
          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
              if (status == google.maps.GeocoderStatus.OK)
                $("#" + addressId).val(results[0].formatted_address);
              else
                $("#error").append("Unable to retrieve your address<br />");
            });
          },
          function(positionError){
            $("#error").append("Error: " + positionError.message + "<br />");
          },
          {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          });
        });
 
        $("#calculate-route").submit(function(event) {

          event.preventDefault();
          calculateRoute($("#from").val(), $("#to").val(), $("#datepicker").val(), $("#platser").val(), $("#bes").val());

          
        });
      });