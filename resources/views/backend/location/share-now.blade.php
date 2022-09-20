@extends('layouts.master')
@section('title', 'Share My Location')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Share My Location</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Share My Location</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    
                    @if(count($errors) > 0)
                        <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                            <x-jet-validation-errors class="mb-4 my-2 text-white" />
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="needs-validation" action="{{ route('start.location') }}" method="post" novalidate="">
                            @csrf

                                <input type="hidden" id="latitude" name="start_latitude">
                                <input type="hidden" id="longitude" name="start_longitude">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Select a Bus</label>
                                            
                                            <select class="form-control select2" id="validationTooltip01" name="bus_id" required="">
                                        
                                                <option value="">Select</option>

                                                @foreach ($buses as $bus)
                                                    <option value="{{ $bus->id }}">
                                                        {{ $bus->bus_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please select any bus from the list.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip02" class="form-label">Select Type</label>
                                            
                                            <select class="form-control select2" id="validationTooltip02" name="type" required="">
                                        
                                                <option value="">Select</option>
                                                <option value="UP">UP</option>
                                                <option value="Down">Down</option>

                                            </select>

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please select either the bus is UP or Down.
                                            </div>
                                        </div>
                                    </div>

                                                       
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Share Location Now</button>
                                        
                                    </div>
                            
                                </div>

                            </form>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection

@section('scripts')
    <script type="text/javascript">
        if (!navigator.geolocation) {
                console.log("Your browser doesn't support geolocation feature!");
            } else {
                var options = { enableHighAccuracy: true,timeout: 600000,maximumAge: 0};
                navigator.geolocation.getCurrentPosition(getPosition, error, options);
                
            }

            function error(err) {console.warn('ERROR(' + err.code + '): ' + err.message);}
            
            function getPosition(position){
                var latitude  = position.coords.latitude;
                var longitude = position.coords.longitude;
                
                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude;
            }
    </script>
@endsection