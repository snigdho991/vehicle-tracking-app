@extends('layouts.master')
@section('title', 'Manage Social Links')

@section('content')
    
    <!-- Question Answer Modal -->
    <div class="modal fade" id="staticBackdropSocial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Social Links <i class="fas fa-question-circle" style="cursor: pointer; font-size: 18px; position: relative; top: 1px;" data-bs-toggle="modal" data-bs-target="#staticBackdropSocial"></i></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Manage Social Links</li>
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
                <div class="col-12">
                    <div class="card mt-4">
                       
                        <div class="row">
                            <div class="col-3">
                                
                            </div>
                            <div class="col-6">
                                <span class="btn btn-danger fw-medium" style="display: block;margin: 0 auto;width: 80%;position: relative; top: -18px;cursor: unset;color: #fff;"> <i class="fas fa-chevron-circle-down" style="font-size: 17px;position: relative;top: 1.5px;"></i> Already Added </span>
                                    
                            </div>
                            <div class="col-3">
                                
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 40px;">
                            <div class="col-lg-3"></div>

                            <div class="col-lg-6" style="text-align: center;">
                                <div class="row">
                                    
                                    @if($profile->social_links != null)

                                        <?php
                                            $convert_array = $profile->social_links;

                                            $str = $convert_array;

                                            $mstr = explode(",",$str);
                                            $a = array();

                                            foreach($mstr as $nstr)
                                            {
                                                $narr = explode("=>",$nstr);
                                                $narr[0] = str_replace("\x98","",$narr[0]);
                                                $ytr[1] = $narr[1];
                                                $a[$narr[0]] = $ytr[1];
                                            }
                                        ?>

                                        @foreach($a as $key => $social)
                                        
                                            <div class="col-3 mt-3">
                                                <a href="{{ "https://".$social }}" target="_blank">
                                                    <img src="{{ asset('assets/uploads/social-logo/'.trim($key).'.png') }}" class="link-icon" style="width: 55px; height: 55px; margin-top:7px; border-radius: 10%;">
                                                </a>
                                                <h6 class="fw-medium mb-2 text-center" style="font-size: 10px; margin-top: 6px;">{{ trim($key) }}</h6>

                                                <a href="{{ route('user.delete.social', trim($key)) }}" class="btn btn-danger btn-sm"> <i class="fas fa-window-close"></i> Remove</a>
                                            </div>

                                        @endforeach

                                    @else
                                        <div class="alert fade show color-box bg-warning bg-gradient" role="alert">
                                            <div class="text-white fw-medium">
                                                No social media has been linked/added with your profile yet. Add social media link from below. <i class="bx bxs-down-arrow-circle" style="font-size: 15px; position: relative; top: 3px;"></i> 
                                            </div>
                                        </div>
                                    @endif
                                    
                                </div>
                                                           
                            </div>

                            <div class="col-lg-3"></div>
                        </div>
                        
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="needs-validation" action="{{ route('save.social.media.links') }}" method="post" enctype="multipart/form-data" novalidate="">
                            @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Select Social Media</label>
                                            
                                            <select name="social_name" class="form-control" id="validationTooltip01">
                                                <option value="">Select One</option>
                                            @foreach($all_socials as $all_social)
                                                <option value="{{ $all_social->name }}">{{ $all_social->name }}</option>
                                            @endforeach
                                            </select>

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please select a social media first.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip02" class="form-label">Link</label> (DON'T include <b>https://</b> before the url. Example: <b>fb.me/snigdho.majumder</b>)
                                            <input type="text" class="form-control" id="validationTooltip02" placeholder="example.com/example" name="social_link" value="{{ old('social_link') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter social media link here.
                                            </div>
                                        </div>
                                    </div>
                                                                      
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Save Social Link</button>
                                        
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