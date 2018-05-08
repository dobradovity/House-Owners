<!DOCTYPE html>
<html>
  <head>
    <!-- this are links for houses for style shows houses from database *start*-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="lib/animate-css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
   <!-- this are links for houses for style shows houses from database *ende*-->
    <style>
        body{
              background-image: url('images/red_wall.jpeg');
              
              background-position: center;
              background-size: auto; 
              background-attachment: scroll;
              }

        #map {
              height: 500px;
              width: 80%;
              
              border-radius: 0px 30px 0px 30px;
              margin-left: 10%;
              margin-right: 10%;
              }

        h2{
              color: white;
              font-size: 35px;
              text-shadow: 2px 3px black;
              }






          


    #map{
      transition: .8s;
      background-color: rgba(0, 0, 0, .5);
     
      border-color:#006; 
      border-bottom-color: black; 
      border-bottom-style: groove;
      border-right-color: black; 
      border-right-style: groove;
      
      border-left: none;
      border-top: none;
      border-width: 13px;

    }
   
   

    @media screen and (max-width: 750px){
      .formulario{
        width: 85%;
        margin-top: 10px;

      }
      

    }

/* this is from me given id in order to change style  for houses outputet from database, to be stronger than bootstrap classes */
    #houses{
      background-image: url('images/sand.jpg');
      border-radius: 0px 30px 0px 30px;
      border-color:#006; 
      border-bottom-color: gray; 
      border-bottom-style: groove;
      border-right-color: gray; 
      border-right-style: groove;
      
      border-left: none;
      border-top: none;
      border-width: 8px;
    }
    .text-center{
      color: black;
    }






   
    </style>
 
  </head>

  <body>
    



    <h2 align="center"> Our Houses Location</h2>
    <br>
    <div id="map"></div>
    <script>

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4.45,
          center: {lat: 48.2081743, lng: 16.37381890000006}
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location, icon: 'images/house1.png',
            label: labels[i % labels.length]
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [
        {lat:48.2541727, lng: 16.426705500000025},
        {lat:48.1924386, lng: 16.35545490000004},
        {lat:48.2014456, lng: 16.359484500000008},
        {lat:48.1946014, lng: 16.36122320000004},
        {lat:48.2641727, lng: 16.429705500000025},
        {lat:48.3924386, lng: 16.35845490000004},
        {lat:48.1014456, lng: 16.259484500000008},
        {lat:48.1446014, lng: 16.39122320000004},
        {lat:48.1646014, lng: 16.16122320000004},
        {lat:48.5641727, lng: 16.729705500000025},
        {lat:48.7924386, lng: 16.25845490000004},
        {lat:48.2014456, lng: 16.459484500000008},
        {lat:48.1746014, lng: 16.39922320000004},
        {lat:48.5746014, lng: 16.49922320000004}
   
      ]
    </script>

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjRYY2Dodc8vWy_Em61Xp9JVFcV-XQKJw&callback=initMap">
    </script>
<!-- this shows houses from database *start*-->
  <hr>
    <div class="container">
      <div class="row">
        <div class="animate wow zoomIn">

                    <?php require_once 'actions/db_connect.php'; ?>


          <?php

              $sql = "SELECT * FROM dragana ;"
;

              $result = $connect->query($sql);

   
              if($result->num_rows > 0) {

                  while($row = $result->fetch_assoc()) {

                      echo "
                        <div class='col-md-4'>
                          <div id='houses' class='thumbnail'>
                              <img src='".$row['image']."' style='width:200px; height:230px;'>
            
                                <p class='text-center'>".$row['address']."</p>
                                <p class='text-center'>".$row['hausnumber']."</p>
                                <p class='text-center'>".$row['size']."</p>
                          </div>
                          </div>
                        ";

                  }

              } else {

                  echo "<center>No Data Avaliable</center>";

              }

              ?>;
          
        </div>
      </div>
    </div>





    <hr>
    <div class="container">
        <a href="home.php" class="btn btn-primary" type="button" >Back</a>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <!-- this shows houses from database *ende*-->

  </body>
</html>