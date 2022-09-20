@extends('layouts.frontend-master')

@section('title', 'Home Page')

@section('content')
        
    <section class="section hero-section bg-ico-hero" id="home" style="padding-top: 150px; padding-bottom: 100px;">
        <div class="nav-back-custom"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">{{ config('app.name') }} - Dummy text will be here</h1>
                        <p class="font-size-14" style="color: #ddd !important;">Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here.Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here.</p>
                        
                        <div class="button-items mt-4">
                            @if(Auth::user())
                                <a href="{{ route('dashboard') }}" target="_blank" class="btn btn-success w-xs">Your Dashboard</a>
                                <a href="{{-- {{ route('frontend.about') }} --}}" class="btn btn-light">About Us</a>
                            @else
                                <a href="{{ route('login') }}" target="_blank" class="btn btn-success w-xs">Sign In</a>
                                <a href="{{ route('register') }}" target="_blank" class="btn btn-primary w-xs">Sign Up</a>
                            @endif

                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-6 col-md-10 col-sm-12 ms-lg-auto">
                    <div class="card overflow-hidden mb-0 mt-5 mt-lg-0">
                        
                            <iframe width="546" height="375" src="https://www.youtube.com/embed/bxoYtCfIBXQ" frameborder="0" title="YouTube video describing the WineText service" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        
                    </div>
                </div> --}}
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="section pt-4 bg-white" id="about" style="padding-top:30px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4 style="margin-bottom: 15px;">Messages from VC</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-6 ms-lg-auto">
                    <p class="font-size-14 mb-3" style="font-weight: 500 !important;">Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here.Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here.Dummy details will be here. Dummy details will be here.</p>
                </div>

                <div class="col-lg-6 col-6 ms-lg-auto">
                    <div class="card overflow-hidden mb-0 mt-5 mt-lg-0">
                        
                            {{-- <img src="assets/images/crypto/blog/img-2.jpg" alt="" class="rounded img-fluid mx-auto d-block"> --}}

                            <div class="zoom-gallery d-flex flex-wrap">
                                <a href="{{ asset('assets/images/crypto/blog/img-2.jpg') }}" title="Title Here">
                                    <img src="{{ asset('assets/images/crypto/blog/img-2.jpg') }}" alt="" class="rounded img-fluid mx-auto d-block">
                                </a>
                            </div>
                        
                    </div>
                </div>
            </div>

            
            <div class="row align-items-center">
                <div class="col-lg-12">

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="section" id="features" style="padding-top:30px !important;">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4>Messages from Chairman, ICT</h4>
                        
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row" style="padding-top:30px !important;">
                <div class="col-lg-6 col-6">
                    <div class="card">
                        <div class="card-body">

                            <div class="zoom-gallery d-flex flex-wrap">
                                <a href="{{ asset('assets/images/crypto/blog/img-2.jpg') }}" title="Title Here">
                                    <img src="{{ asset('assets/images/crypto/blog/img-2.jpg') }}" alt="" class="img-fluid d-block mx-auto">
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6 col-6">
                    <p class="font-size-14 mb-3" style="font-weight: 500 !important;">Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here.Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here. Dummy details will be here.Dummy details will be here. Dummy details will be here.</p>
                </div>

            </div>

        </div>
        <!-- end container -->
    </section>


    <section class="section bg-white" id="news" style="padding-top:30px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4>How it works?</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12 col-lg-12">
                    <p class="card-title-desc font-size-14">
                        In addition to our border-radius utilities, you can use to give an image a rounded 1px border appearance. In addition to our border-radius utilities, you can use to give an image a rounded 1px border appearance. In addition to our border-radius utilities, you can use to give an image a rounded 1px border appearance. In addition to our border-radius utilities, you can use to give an image a rounded 1px border appearance. In addition to our border-radius utilities, you can use to give an image a rounded 1px border appearance. In addition to our border-radius utilities, you can use to give an image a rounded 1px border appearance. In addition to our border-radius utilities, you can use to give an image a rounded 1px border appearance.In addition to our border-radius utilities, you can use to give an image a rounded 1px border appearance.In addition to our border-radius utilities, you can use to give an image a rounded 1px border appearance.
                    </p>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-3"></div>

                <div class="col-lg-6 col-md-10 col-sm-12 ms-lg-auto">
                    <div class="card overflow-hidden mb-0 mt-5 mt-lg-0">
                        
                            <iframe width="546" height="375" src="https://www.youtube.com/embed/GIt7AL1_nvc" frameborder="0" title="YouTube video describing the WineText service" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        
                    </div>
                </div>

                <div class="col-lg-3"></div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 25px;">
                    <a href="" class="btn btn-success"> Show All <i class="bx bx-right-arrow-circle font-size-20 align-middle me-1"></i></a>
                </div>
            </div> --}}
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>


    <section class="section" id="news" style="padding-top:30px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4>Advertisement Section</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 25px;">
                    <a href="" class="btn btn-success" style="width: 50%;"><i class="bx bx-hourglass bx-tada font-size-18 align-middle me-2"></i> Button Here <i class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i></a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>


@endsection

@section('scripts')
    
    <script>
        $(document).ready(function() {
            $(".select2").select2({
                allowClear: true,
            });
        });
    </script>

    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            margin:10,
            loop:true,
            autoWidth:true,
            items:4,
            rtl:false,
        });
    </script>
@endsection