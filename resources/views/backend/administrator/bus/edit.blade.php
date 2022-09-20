@extends('layouts.master')
@section('title', 'Edit Bus')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Bus</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Edit Bus</li>
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

                            <form class="needs-validation" action="{{ route('bus.update', $bus->id) }}" method="post" enctype="multipart/form-data" novalidate="">
                            @csrf

                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                        <p style="text-align: center;">@if($bus->photo) Current @else Default @endif Photo</p>
                                        <div class="zoom-gallery d-flex flex-wrap">
                                            @if($bus->photo)
                                                <a href="{{ asset('assets/uploads/bus-photo/'.$bus->photo) }}" title="{{ $bus->photo }}">
                                                    <img src="{{ asset('assets/uploads/bus-photo/'.$bus->photo) }}" alt="" style="height: 175px !important; width: 175px !important;" class="img-thumbnail rounded-circle">
                                                </a>
                                            @else
                                                <a href="{{ asset('assets/uploads/default/bus.png') }}" title="Default Bus Image">
                                                    <img src="{{ asset('assets/uploads/default/bus.png') }}" alt="" style="height: 175px !important; width: 175px !important;" class="img-thumbnail rounded-circle">
                                                </a>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-5"></div>
                                </div>
                                
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Bus Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter bus name" name="bus_name" value="{{ old('bus_name', $bus->bus_name) }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter bus name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip03" class="form-label">Change Photo</label>
                                            <input type="file" class="form-control" name="photo" >  
                                        </div>
                                    </div>
                                                                      
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Update Bus</button>
                                        
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