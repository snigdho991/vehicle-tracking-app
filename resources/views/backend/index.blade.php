@extends('layouts.master')
@section('title', 'Administrator Dashboard')

@section('content')

    <!-- Question Answer Modal -->
    <div class="modal fade" id="currentlyOnRoad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">How It Works?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Question-1: How it works?</h5>
                    <p style="font-weight: 500;">Answer: Dummy Text will be there. Dummy Text will be there. Dummy Text will be there. </p>
                </div>
                <div class="modal-footer">
                    <span style="width: 100%;text-align: center;">
                        <button type="button" class="btn btn-light text-center" data-bs-dismiss="modal">Close</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

	<div class="page-content">
	    <div class="container-fluid">

	        <!-- start page title -->
	        <div class="row">
	            <div class="col-12">
	                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                    <h4 class="mb-sm-0 font-size-18">{{ Auth::user()->role }} Dashboard</h4>
                    </div>
	            </div>
	        </div>

	        <div class="row">
                <div class="col-xl-12">
                    
                    <div class="row" id="deviceStandard" style="margin-top:-40px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-4" style="text-align: center !important;">
                            <div class="alert alert-info fade show mb-0" style="font-weight:600;" role="alert">
                                <i class="bx bx-timer bx-tada me-2 font-size-15" style="position: relative; top: 2px !important;"></i>
                                <span class="timer"></span>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <br><br>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4" style="text-align: center !important;">
                            <span class="badge bg-dark btn-rounded font-size-12"><span style="position: relative; bottom: 1px;">Currently On Road</span> <i class="bx bx-caret-down"></i></span> <i class="far fa-question-circle" style="cursor: pointer; font-size: 18px; margin-left: 3px; position: relative; top: 2px;" data-bs-toggle="modal" data-bs-target="#currentlyOnRoad"></i><br><br>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-12" style="text-align: center !important;">
                            
                            <span class="btn btn-success waves-effect waves-light"> <i class="bx bx-upvote bx-fade-up font-size-18 align-middle me-1"></i> UP - Campus to Town <i class="mdi mdi-arrow-right-drop-circle font-size-15 bx-fade-up align-middle ms-1"> </i> </span>
                            
                        </div>
                        
                    </div>

                </div>
            </div>
            <!-- end row -->

            <div class="row" style="margin-top:25px;">

                @if($upbuses->count() > 0)
                    @foreach($upbuses as $upbus)

                        <?php
                            $getbus = App\Models\Bus::where('id', $upbus->bus_id)->first();
                            $bus_slug = \Illuminate\Support\Str::slug($getbus->bus_name);
                        ?>
                    
                        <div class="col-6 col-md-3">        
                            <div class="card">
                            @if($getbus->photo != null)
                                <img class="card-img-top img-fluid" style="height: 125px !important;" src="{{ asset('assets/uploads/bus-photo/'.$getbus->photo) }}" alt="Bus Image">
                            @else
                                <img class="card-img-top img-fluid" style="height: 125px !important;" src="{{ asset('assets/uploads/default/bus.png') }}" alt="Default Bus Image">
                            @endif

                                <div class="card-body">
                                    <h4 class="card-title mt-0">{{ $getbus->bus_name }}</h4>
                                    <p class="card-text"> Start Time: <span class="text-muted" style="font-weight:505;">{{ date("h:i a", strtotime($upbus->started_at)) }}</span></p>
                                    <a href="{{ route('track.location', ['bus' => $bus_slug, 'id' => $upbus->id]) }}" class="btn btn-primary btn-rounded waves-effect btn-label waves-light"><i class="bx bxs-map label-icon spinner-grow"></i> Track Bus </a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    <div class="col-12 col-lg-12" style="text-align: center;">
                        
                        <span class="badge bg-white btn-rounded font-size-13">
                                <span style="position: relative; bottom: 0.5px;"><b class="text-success fw-medium">No UP Bus Found on the road right now!</b> </span> <i class="bx bx-caret-down bx-tada text-success"></i>
                        </span>

                    </div>
                @endif

            </div>

            <br><br>

            <div class="row">
                        
                <div class="col-md-12" style="text-align: center !important;">
                    
                    <span class="btn btn-danger waves-effect waves-light"> <i class="bx bx-downvote bx-fade-down font-size-18 align-middle me-1"></i> DOWN - Town to Campus <i class="mdi mdi-arrow-right-drop-circle font-size-15 bx-fade-down align-middle ms-1"> </i> </span>
                    
                </div>
                
            </div>


            <div class="row" style="margin-top:25px;">

                @if($downbuses->count() > 0)
                    @foreach($downbuses as $downbus)

                        <?php
                            $getbus = App\Models\Bus::where('id', $downbus->bus_id)->first();
                            $bus_slug = \Illuminate\Support\Str::slug($getbus->bus_name);
                        ?>
                    
                        <div class="col-6 col-md-3">        
                            <div class="card">
                            
                            @if($getbus->photo != null)
                                <img class="card-img-top img-fluid" style="height: 125px !important;" src="{{ asset('assets/uploads/bus-photo/'.$getbus->photo) }}" alt="Bus Image">
                            @else
                                <img class="card-img-top img-fluid" style="height: 125px !important;" src="{{ asset('assets/uploads/default/bus.png') }}" alt="Default Bus Image">
                            @endif

                                <div class="card-body">
                                    <h4 class="card-title mt-0">{{ $getbus->bus_name }}</h4>
                                    <p class="card-text"> Start Time: <span class="text-muted" style="font-weight:505;">{{ date("h:i a", strtotime($downbus->started_at)) }}</span></p>
                                    <a href="{{ route('track.location', ['bus' => $bus_slug, 'id' => $downbus->id]) }}" class="btn btn-primary btn-rounded waves-effect btn-label waves-light"><i class="bx bxs-map label-icon spinner-grow"></i> Track Bus </a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    <div class="col-12 col-lg-12" style="text-align: center;">
                        <span class="badge bg-white btn-rounded font-size-13">
                                <span style="position: relative; bottom: 0.5px;"><b class="text-danger fw-medium">No Down Bus Found on the road right now!</b> </span> <i class="bx bx-caret-down bx-tada text-danger"></i>
                        </span>
                    </div>

                    <br>
                @endif

            </div>

	    </div>
	</div>

@endsection

@section('styles')
    <style type="text/css">
        .spinner-grow {
            animation: 0.9s linear infinite spinner-grow !important;
        }

        @media screen and (max-width: 1199px) and (min-width: 300px) {
            #deviceStandard{
                margin-top: 5px !important;
            }

            #marBot{
                margin-top: 12px !important;
            }
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        window.onload = displayClock();
        
        function displayClock(){
            var display = new Date().toLocaleTimeString();
            $('.timer').text(display);
            setTimeout(displayClock, 1000); 
        }
    </script>
@endsection