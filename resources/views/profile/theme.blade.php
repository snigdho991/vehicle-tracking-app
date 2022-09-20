@extends('layouts.master')
@section('title', 'Select Profile Theme')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Select Profile Theme</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Select Profile Theme</li>
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

                            <?php
                                $profile = App\Models\Profile::where('user_id', Auth::id())->first();
                            ?>

                            <form class="needs-validation" action="{{ route('public.theme') }}" method="post" novalidate="">
                            @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">In which theme other users can see your Profile?</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <div class="form-check form-radio-success mb-3">
                                                <input class="form-check-input" type="radio" name="profile_mode" value="default" id="formRadioColor2" @if($profile->public_theme == 'default') checked="" @endif>
                                                <label class="form-check-label" for="formRadioColor2">
                                                    Light Mode
                                                </label>
                                            </div>

                                            <div class="form-check form-radio-success mb-3">
                                                <input class="form-check-input" type="radio" name="profile_mode" value="dark" id="formRadioColor3" @if($profile->public_theme == 'dark') checked="" @endif>
                                                <label class="form-check-label" for="formRadioColor3">
                                                    Dark Mode
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                                                      
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Select Profile Mode</button>
                                        
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