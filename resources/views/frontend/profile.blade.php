<style>
    .link-icon {
        position: relative;
        margin: auto;
        width: 55px;
        height: 55px;
        border-radius: 10%;
        -o-object-fit: cover;
        object-fit: cover;
        z-index: 1;
    }

    /*.Facebook {
        box-shadow: 0 0 10px 1px #1877f2;
    }

    .Instagram {
        box-shadow: 0 0 10px 1px #9636ad;
    }

    .Whats {
        box-shadow: 0 0 10px 1px #2ed64a;
    }*/

    .customSocial {
        padding: 15px;
        background: #ddd;
    }

    /*.Email {
        box-shadow: 0 0 10px 1px #1b9ff7;
    }*/

    #customBtn{
        width: 85%;
        padding: 16px;
        background: #F0F2F5;
        border-color: #F0F2F5;
        color: #222;
        /* font-weight: bold; */
        border-radius: 21px !important;
        margin-left: -7px;
        box-shadow: 0 1px 2px #00000000  
    }
</style>

@extends('layouts.frontend-master')

@section('title', 'Profile Of ' . $user->name)

@section('content')
        
    <section class="section" id="news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="zoom-gallery flex-wrap">
                        @if($user->cover_photo != null)
                            <a href="{{ asset('assets/uploads/users/cover/'.$user->cover_photo) }}" title="{{ $user->cover_photo }}">
                                <img src="{{ asset('assets/uploads/users/cover/'.$user->cover_photo) }}" alt="" class="rounded" style="width: 100% !important; height: 325px;">
                            </a>
                        @else
                            <a href="{{ config('core.image.default.cover') }}" title="No Cover Photo">
                                <img src="{{ config('core.image.default.cover') }}" alt="" class="rounded" style="width: 100% !important; height: 325px;">
                            </a>
                        @endif
                    </div>

                    <div class="card">

                        <div class="row">
                            <div class="col-md-5">
                                
                            </div>
                            <div class="col-md-2">
                                <div class="avatar-md profile-user-wid mb-4" style="display: block;margin: auto; margin-top: -180px;height: 220px; width: 220px;">
                                    <div class="zoom-gallery d-flex flex-wrap">
                                    
                                        @if($user->profile_photo_path != null)
                                            <a href="{{ asset('assets/uploads/users/profile/'.$user->profile_photo_path) }}" title="{{ $user->profile_photo_path }}">
                                                <img src="{{ asset('assets/uploads/users/profile/'.$user->profile_photo_path) }}" alt="" style="height: 220px !important; width: 220px !important;" class="img-thumbnail rounded-circle">
                                            </a>
                                        @else
                                            <a href="{{ config('core.image.default.avatar') }}" title="No Profile Photo">
                                                <img src="{{ config('core.image.default.avatar') }}" alt="" style="height: 220px !important; width: 220px !important;" class="img-thumbnail rounded-circle">
                                            </a>
                                        @endif

                                    </div>
                                </div>

                                    @if($user->id == Auth::id())
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;margin-top: -15px; margin-bottom: 10px;">

                                                <span class="badge rounded-pill badge-soft-success mt-2">Own Profile</span>
                                                
                                            </div>
                                        </div>
                                    @endif

                                    <h4 class="text-info text-center">{{ $user->name }}</h4>

                                    <h6 class="fw-medium mb-2 text-center" style="font-size: 14px;">@if($user->hometown) From {{ $user->hometown }} @else Hometown: N/A @endif</h6>

                                    <div style="text-align: justify;">
                                        <p class="text-center text-muted">
                                            Dept: <span class="fw-medium">@if($user->dept){{ $user->dept }} @else N/A @endif</span>
                                        </p>

                                        <p class="text-center text-muted">
                                            ID: <span class="fw-medium">@if($user->stu_id){{ $user->stu_id }} @else N/A @endif</span>
                                        </p>

                                        <p class="text-center text-muted">
                                            Session: <span class="fw-medium">@if($user->session){{ $user->session }} @else N/A @endif</span>
                                        </p>
                                    </div>
                                    
                                    @if($user->skills)
                                        <div class="d-flex flex-wrap gap-2 widget-tag" style="margin-bottom: 25px; margin-left:5px;">

                                            <?php
                                                $proskills = explode(",", $user->skills);
                                            ?>

                                            @foreach($proskills as $proskill) 
                                                <div>
                                                    <a href="#" class="badge bg-danger font-size-12">{{ $proskill }}</a>
                                                </div>
                                            @endforeach                               
                                        </div>
                                    @endif
                                    
                                    @if($user->id == Auth::id())
                                        <p class="text-center">
                                            <a class="btn btn-light btn-sm" target="_blank" href="{{ route('edit.profile') }}"><i class="bx bxs-edit me-1" style="position: relative; top: 2px; font-size: 15px;"></i> Edit Your Profile 
                                            </a>
                                        </p>
                                    @endif
                            </div>
                            <div class="col-md-5">
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->
            <br>
            <br>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                       
                        <div class="row">
                            <div class="col-3">
                                
                            </div>
                            <div class="col-6">
                                <span class="btn btn-danger fw-medium" style="display: block;margin: 0 auto;width: 80%;position: relative; top: -18px;cursor: unset;color: #fff;"> <i class="fas fa-chevron-circle-down" style="font-size: 17px;position: relative;top: 1.5px;"></i> Social/Contact Links </span>
                                    
                            </div>
                            <div class="col-3">
                                
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 40px;">
                            <div class="col-12 col-lg-12" style="text-align: center;">
                                <div class="row">
                                    
                                    @if($user->social_links != null)

                                        <?php
                                            $convert_array = $user->social_links;

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
                                        
                                            <div class="col-4 mt-2">
                                                <a href="{{ "https://".$social }}" target="_blank">
                                                    <img src="{{ asset('assets/uploads/social-logo/'.trim($key).'.png') }}" class="link-icon" style="margin-top:7px;">
                                                </a>
                                                <h6 class="fw-medium text-center {{-- custom-social-key --}} mb-2" style="font-size: 10px; margin-top: 6px;">{{ trim($key) }}</h6>
                                            </div>

                                        @endforeach

                                        @if($user->id == Auth::id())
                                            <p class="text-center mt-4">
                                                <a class="btn btn-light btn-sm" target="_blank" href="{{ route('social.media.links') }}"><i class="bx bxs-edit me-1" style="position: relative; top: 2px; font-size: 15px;"></i> Edit/Manage Social Links
                                                </a>
                                            </p>
                                        @endif

                                    @else
                                        <div class="col-2 col-lg-2"></div>
                                        <div class="col-8 col-lg-8" style="text-align: center;">
                                            <div class="alert fade show color-box bg-primary bg-gradient mt-3" role="alert">
                                                <div class="text-white" style="font-weight:550;">
                                                    No social media has been linked with the profile. 
                                                    @if($user->id == Auth::id())
                                                        <br>
                                                        <a class="btn btn-light btn-sm mt-2" target="_blank" href="{{ route('social.media.links') }}"><i class="bx bx-add-to-queue me-1" style="position: relative; top: 2px; font-size: 15px;"></i> Add Social Links
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-2"></div>
                                    @endif
                                    
                                </div>
                                                           
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
        
@endsection

@section('styles')
    
    <style type="text/css">
        @media screen and (min-width:100px) and (max-width:470px) {
            .custom-social-key {
                width: 53px !important;
            }
        }
    </style>

@endsection