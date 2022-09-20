@extends('layouts.master')
@section('title', 'Location Tracker')

@section('content')
    
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Location Tracker</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Location Tracker</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-lg-12">
                
                <div class="card text-center">
                    <div class="card-body">
                       <h6 class="font-size-13">BUS NAME : <span class="text-primary">{{ $bus->bus_name }}</span> <b style="font-weight: 550;"> | </b> Start Time : <span class="text-primary">{{ date("d M", strtotime($sharer->started_at)) }}</span> - <span class="text-primary">{{ date("h:i a", strtotime($sharer->started_at)) }}</span> @if($sharer->stopped_at != null) <b style="font-weight: 550;"> | </b> Stop Time : <span class="text-primary">{{ date("d M", strtotime($sharer->stopped_at)) }}</span> - <span class="text-primary">{{ date("h:i a", strtotime($sharer->stopped_at)) }}</span> @endif | @if($sharer->type == "Down")<span class="text-danger">Down <i class="mdi mdi-arrow-down-drop-circle font-size-15 bx-fade-down align-middle"> </i></span> @elseif($sharer->type == "UP") <span class="text-success">UP <i class="mdi mdi-arrow-up-drop-circle font-size-15 bx-fade-down align-middle"> </i></span> @endif
                       </h6>
                        <span class="badge bg-light btn-rounded font-size-13">
                            @if(Auth::id() == $sharer->user_id)
                                <span style="position: relative; bottom: 0.5px;">You have travelled <b class="text-info" id="distance"></b> !</span> <i class="bx bx-caret-down bx-tada"></i>
                            @else
                                <span style="position: relative; bottom: 0.5px;">Bus is currently <b class="text-info" id="distanceFar"></b> far away from you !</span> <i class="bx bx-caret-down bx-tada"></i>
                            @endif
                        </span>
                    </div>
                </div>

            </div>

            <div class="row">               
                <div class="col-lg-9" style="margin-bottom: 25px !important;">                    
                    <div id="map" data-sharer="{{ $sharer->user_id }}" data-latitude="{{ $location->start_latitude }}" data-longitude="{{ $location->start_longitude }}" data-share="{{ $sharer->id }}" style="height: 450px !important; border: 1px solid #bbb !important;" class="gmaps"></div>                       
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="badge bg-primary font-size-11">@if(Auth::id() == $sharer->user_id) Your Info @else Sharer Info @endif</span>
                            <div class="avatar-sm mx-auto mb-4 mt-4">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                    @if($user->profile_photo_path)
                                        <img src="{{ asset('assets/uploads/users/profile/'.$user->photo) }}" alt="user-profile-pic" height="40" width="40" style="border-radius: 50%;">
                                    @else
                                        {{ $avatar }}
                                    @endif
                                </span>
                            </div>
                            <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">{{ $user->name }}</a></h5>
                            <p class="text-muted mb-1">Dept: <span style="font-weight: 600;"> @if($user->dept) {{ $user->dept }} @else N/A @endif</span></p>
                            <p class="text-muted">Session: <span style="font-weight: 600;">@if($user->dept) {{ $user->dept }} @else N/A @endif</span></p>

                        </div>
                        <div class="card-footer bg-transparent border-top">
                            {{-- <div class="contact-links d-flex font-size-20">
                                <div class="flex-fill">
                                    <a href="#"><i class="bx bxl-facebook-circle"></i></a>
                                </div>
                                <div class="flex-fill">
                                    <a href="#"><i class="bx bx-pie-chart-alt"></i></a>
                                </div>
                                <div class="flex-fill">
                                    <a href="#"><i class="bx bx-user-circle"></i></a>
                                </div>
                            </div> --}}

                            <a href="{{ route('frontend.profile', \Illuminate\Support\Str::slug($user->name)) }}" target="_blank" class="text-primary">View Profile <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>

                @if(Auth::id() == $sharer->user_id || Auth::user()->hasRole('Administrator'))
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom text-muted text-center">
                            <b class="text-success">Congress !</b> You are sharing location. 
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 mb-3" style="margin-top: 5px !important;">
                                    <div class="card border mb-0 mt-1">
                                        <div class="card-header">
                                            <h6 class="my-0 text-dark text-center">Your Tool</h6>
                                        </div> 

                                        <div class="card-body bg-transparent text-center">
                                            <a class="btn btn-danger waves-effect btn-label waves-light" href="#" onclick="stopSharing()" style="width: 100%;" id="marBot"><i class="bx bx-key label-icon"></i> Stop Sharing Location</a>
                                        </div>
                                    </div>
                                </div>
                                                                       
                            </div>
                        </div>
                    </div>
                @endif

                </div>
            </div>

            <div class="row">
                
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection

@section('scripts')
    {{-- <script src="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.js"></script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoicmFta3Jpc2hubyIsImEiOiJja3VkMjFrYm4xNjU2MnVtdjN0NXU5ODd1In0.9QVuKq5Q0SrO8JnG_ILAuQ';

        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v11', // style URL
            center: [90.4000536, 24.7552144], // starting position
            zoom: 15 // starting zoom
        });

        
        // Add geolocate control to the map.
        map.addControl(
            new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
                // When active the map will receive updates to the device's location as it changes.
                trackUserLocation: true,
                // Draw an arrow next to the location dot to indicate which direction the device is heading.
                showUserHeading: true
            })
        );
    </script> --}}
    
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

    @if(Auth::id() == $sharer->user_id || Auth::user()->hasRole('Administrator'))

        <script type="text/javascript">
            var getmap = document.getElementById('map');
            var sharer = getmap.getAttribute('data-sharer');
            var share  = getmap.getAttribute('data-share');
            var lat    = getmap.getAttribute('data-latitude');
            var long   = getmap.getAttribute('data-longitude');

            var map = L.map('map').setView([lat, long], 17);

            /*var map = L.map('map').fitWorld();
            //$table->double('lat')->nullable(); 
            map.locate({setView: true, maxZoom: 15});*/

            var osm = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicmFta3Jpc2hubyIsImEiOiJja3VkMjFrYm4xNjU2MnVtdjN0NXU5ODd1In0.9QVuKq5Q0SrO8JnG_ILAuQ', {
                maxZoom: 17,
                id: 'mapbox/outdoors-v11',
                tileSize: 512,
                zoomOffset: -1
            });

            osm.addTo(map);

            var busIcon = L.icon({
                iconUrl: '{{ asset('assets/uploads/default/final-2.png') }}',
                shadowUrl: 'https://leafletjs.com/examples/custom-icons/leaf-shadow.png',

                iconSize:     [28, 36], // size of the icon
                shadowSize:   [0, 0], // size of the shadow
                
            });

            var greenIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            var marker;
            var marker_start;

            var watchID;
            var watchIDTwo;

            marker = L.marker([lat, long]).addTo(map).bindTooltip("My Location");

            if (!navigator.geolocation) {
                alert("Your browser doesn't support geolocation feature! Please update your browser.");
            } else {
                var options = { enableHighAccuracy: true,timeout: 600000,maximumAge: 60000};
                watchID = setInterval(() => {
                    navigator.geolocation.getCurrentPosition(getPosition, error, options);
                }, 3000);

            }

            function error(err) {console.warn('ERROR(' + err.code + '): ' + err.message);}
            
            function getPosition(position){
                latitude  = position.coords.latitude + Math.random() * (0.6 - 0.594) + 0.001;
                longitude = position.coords.longitude + Math.random() * (0.6 - 0.594) + 0.001;
                accuracy  = position.coords.accuracy;

                let _token   = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url:'/update-location/' + sharer + '/' + share,
                    type:'POST',
                    data:{
                        latitude:latitude,
                        longitude:longitude,
                        accuracy:accuracy,
                        _token: _token
                    },
                    success: function(response){
                        // console.log(response);
                    }, 
                    error: function(err){
                        // console.log(err);
                    }
                });

                var p = 0.017453292519943295;    // Math.PI / 180
                var c = Math.cos;
                var a = 0.5 - c((lat - latitude) * p)/2 + 
                    c(lat * p) * c(latitude * p) * 
                    (1 - c((long - longitude) * p))/2;

                var distance = 12742 * Math.asin(Math.sqrt(a));

                document.getElementById('distance').innerHTML = distance.toFixed(3) + ' km';

                if (marker_start) {
                    map.removeLayer(marker_start);
                }

                if (marker) {
                    map.removeLayer(marker);
                }

                marker_start = L.marker([lat, long], {icon: greenIcon}).addTo(map).bindTooltip("Start Location");
                marker = L.marker([latitude, longitude], {icon: busIcon}).addTo(map).bindTooltip("My Location");
                
                var featureGroup = L.featureGroup([marker_start, marker]).addTo(map);
                map.fitBounds(featureGroup.getBounds());

            }

            function stopSharing() {
                var latit;
                var longit;

                if (navigator.geolocation) {
                    watchIDTwo = navigator.geolocation.getCurrentPosition(getLocation);
                } else { 
                    alert("Your browser doesn't support geolocation feature! Please update your browser.");
                }
            }

            function getLocation(position) {

                latit  = position.coords.latitude;
                longit = position.coords.longitude;

                let _token   = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url:'/stop-location/' + sharer + '/' + share,
                    type:'POST',
                    data:{
                        latit:latit,
                        longit:longit,
                        _token: _token
                    },
                    
                    success: function(response){
                        navigator.geolocation.clearWatch(watchID);
                        navigator.geolocation.clearWatch(watchIDTwo);
                        sessionStorage.setItem("successTrack", "successTrack");
                        window.location.href = "/thanks";
                    },

                    error: function(err){
                        // console.log(err);
                    }
                });
            }
        </script>

    @else 

        <script type="text/javascript">
            var options = { enableHighAccuracy: true, timeout: 600000, maximumAge: 60000};
            var getmap = document.getElementById('map');
            var sharer = getmap.getAttribute('data-sharer');
            var share = getmap.getAttribute('data-share');

            var lat    = getmap.getAttribute('data-latitude');
            var long   = getmap.getAttribute('data-longitude');

            var map = L.map('map').setView([lat, long], 15);

            var marker;
            var my_marker;
            var watchID;

            var osm = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicmFta3Jpc2hubyIsImEiOiJja3VkMjFrYm4xNjU2MnVtdjN0NXU5ODd1In0.9QVuKq5Q0SrO8JnG_ILAuQ', {
                maxZoom: 15,
                id: 'mapbox/outdoors-v11',
                tileSize: 512,
                zoomOffset: -1
            });

            osm.addTo(map);

            var busIcon = L.icon({
                iconUrl: '{{ asset('assets/uploads/default/final-2.png') }}',
                shadowUrl: 'https://leafletjs.com/examples/custom-icons/leaf-shadow.png',

                iconSize:     [28, 36], // size of the icon
                shadowSize:   [0, 0], // size of the shadow
                
            });

            var orangeIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-orange.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            /*function updateLocation() {
                
                $.ajax({
                    url:'/get-location/' + sharer,
                    type:'GET',
                    
                    success:function(response){
                        if (marker) {
                            map.removeLayer(marker);
                        }

                        marker = L.marker([response.latitude, response.longitude], {icon: busIcon}).addTo(map).bindTooltip("Bus Location");

                        var featureGroup = L.featureGroup([marker]).addTo(map);
                        map.fitBounds(featureGroup.getBounds());

                        console.log(response.latitude + '-' + response.longitude + '-' + response.accuracy);


                    }, error:function(err){
                        console.log(err);
                    }
                });               
            }

            setInterval(function() {
                updateLocation();
            }, 1000);*/

            if (navigator.geolocation) {
                watchID = setInterval(() => {
                            navigator.geolocation.getCurrentPosition(updateLocation);
                        }, 1000);
            } else { 
                alert("Your browser doesn't support geolocation feature! Please update your browser.");
            }

            function updateLocation (position) {
                latit  = position.coords.latitude;
                longit = position.coords.longitude;

                $.ajax({ url: '/get-location/' + sharer + '/' + share, success: function(data){
                
                    if (my_marker) {
                        map.removeLayer(my_marker);
                    }

                    if (marker) {
                        map.removeLayer(marker);
                    }

                    var p = 0.017453292519943295;    // Math.PI / 180
                    var c = Math.cos;
                    var a = 0.5 - c((latit - data.latitude) * p)/2 + 
                        c(latit * p) * c(data.latitude * p) * 
                        (1 - c((longit - data.longitude) * p))/2;

                    var distance = 12742 * Math.asin(Math.sqrt(a));

                    document.getElementById('distanceFar').innerHTML = distance.toFixed(3) + ' km';

                    my_marker = L.marker([latit, longit], {icon: orangeIcon}).addTo(map).bindTooltip("My Location");
                    marker = L.marker([data.latitude, data.longitude], {icon: busIcon}).addTo(map).bindTooltip("Bus Location");

                    var featureGroup = L.featureGroup([my_marker, marker]).addTo(map);
                    map.fitBounds(featureGroup.getBounds());

                    }
                });
            }

        </script>

    @endif
@endsection

@section('styles')
    {{-- <link href="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.css" rel="stylesheet">
    <style type="text/css">
       #map { width: 100%; } 
    </style> --}}

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

@endsection
