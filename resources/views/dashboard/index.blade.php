<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}" >
  {{-- <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> --}}

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

  <style>
/*  .carousel-inner img {
    width: 100%;
    height: 100%;
  }*/
  body{
    /*color:white !important;*/
  }
.card-header{
  background-color: #563d7c;
  color:white;
  /*box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .05), inset 0 -1px 0 rgba(0, 0, 0, .1);*/

}
.card-footer{
  background-color: #563d7c;z-index: 1422;
  border:none !important;
  /*box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .05), inset 0 -1px 0 rgba(0, 0, 0, .1);*/

}
.carousel-control-next,
.carousel-control-prev {
    filter: invert(100%);
}
.sl-title{
  position: absolute;
    top: 0;
    left: 25%;
    font-size: 31px;
    background: #343a408a;
    color: white;
    font-weight: bolder;
    width: 50%;
    z-index: 1245;
}
.sl-content{
position: absolute;
    right: -1%;
    width: 20%;
    top: 10%;
    z-index: 1234;
    height: 50vh;
    background: #563e7b8c;
    border: 5px solid #563e7b;
    border-radius: 5px;
    color: white;
}
.sl-foo{
  position: absolute;
    bottom: 14px;
    left: 0px;
    width: 100%;
    z-index: 1234;
   background-color: #563d7c;
    color: white;
    font-size: 1.4rem;
}
video {
  object-fit: cover;
  width: 100vw;
  height: 93vh;
  position: fixed;
  top: 0;
  left: 0;

}


  </style>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
</head>
<body>


<div class="container-fluid px-0"> <!-- data-interval="true" -->
    {{-- <div id="carouselExampleControls" class="carousel slide"  data-pause="hover"  data-ride="carousel"> --}}
    <div id="carouselExampleControls" class="carousel slide"  data-interval="false"  data-ride="carousel">
        <div class="carousel-inner bg-info" role="listbox">
          @include('dashboard.components.sliders.kiosk_01_welcome')
          @include('dashboard.components.sliders.kiosk_02_union')
          @include('dashboard.components.sliders.kiosk_03_iframe_weather')
          @include('dashboard.components.sliders.kiosk_04_floodsummary')
          @include('dashboard.components.sliders.kiosk_05_tendaysforcast')
          @include('dashboard.components.sliders.kiosk_06_inundation')
          @include('dashboard.components.sliders.kiosk_07_vulnerability')
          @include('dashboard.components.sliders.kiosk_08_impactbased')
          @include('dashboard.components.sliders.kiosk_09_news')
          @include('dashboard.components.sliders.kiosk_10_localuse')
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{-- <div class="card-footer text-muted" style="height:auto;padding: 0px;margin:0px;">
  Project Name, Consortium partners, tagline etc.
  <span style="float:left;">(duration : 7000ms)</span>
</div>
 --}}


</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="{{asset('js/catiline.js')}}"></script>
  <script src="{{asset('js/leaflet.shpfile.js')}}"></script>
<script>

  var mymap = L.map('mapid').setView([23.6850,  90.3563], 6).invalidateSize(true);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    // id: 'mapbox/streets-v11',
    id: 'mapbox/light-v10',
    tileSize: 512,
    // invalidateSize:false,
    zoomOffset: -1
  }).addTo(mymap);
// map.invalidateSize(false);


var shpfile = new L.Shapefile('{{ asset("shapefile/administrative_boundary_of_bangladesh_upazila_level.zip")}}', {
      onEachFeature: function(feature, layer) {
        if (feature.properties) {
          layer.bindPopup(Object.keys(feature.properties).map(function(k) {
            // console.log(k[NAME_2]);
            return k + ": " + feature.properties[k];
          }).join("<br />"), {
            maxHeight: 200
          });
        }
      }
    });
    shpfile.addTo(mymap);

    
    shpfile.once("data:loaded", function() {
      console.log("finished loaded shapefile");
    });
    // mymap.invalidateSize();
    // $(document).ready(function () {
    // document.getElementById('mapid').style.display = 'block';
    // mymap.invalidateSize();

    mymap.invalidateSize();



// });
// document.getElementById("submit").onclick = function(e){
//   var files = document.getElementById('file').files;
//   if (files.length == 0) {
//     return; //do nothing if no file given yet
//   }
  
//   var file = files[0];
  
//   if (file.name.slice(-3) != 'zip'){ //Demo only tested for .zip. All others, return.
//     document.getElementById('warning').innerHTML = 'Select .zip file';    
//     return;
//   } else {
//     document.getElementById('warning').innerHTML = ''; //clear warning message.
//     handleZipFile(file);
//   }
// };

//More info: https://developer.mozilla.org/en-US/docs/Web/API/FileReader
// function handleZipFile(file){
//   var reader = new FileReader();
//   reader.onload = function(){
//     if (reader.readyState != 2 || reader.error){
//       return;
//     } else {
//       convertToLayer(reader.result);
//     }
//   }
//   reader.readAsArrayBuffer(file);
// }

// function convertToLayer(buffer){
//   shp(buffer).then(function(geojson){ //More info: https://github.com/calvinmetcalf/shapefile-js
//     var layer = L.shapefile(geojson).addTo(map);//More info: https://github.com/calvinmetcalf/leaflet.shapefile
//     console.log(layer);
//   });
// }

$.fn.carousel.Constructor.prototype.cycle = function (event) {
    
    if (!event) {
        this._isPaused = false;
      }

      if (this._interval) {
        clearInterval(this._interval)
        this._interval = null;
      }

      if (this._config.interval && !this._isPaused) {
          
        var $ele = $('.carousel-item-next');
        var newInterval = $ele.data('interval') || this._config.interval;
        this._interval = setInterval(
          (document.visibilityState ? this.nextWhenVisible : this.next).bind(this),
          newInterval
        );
      }
};


</script>
</body>
</html> 