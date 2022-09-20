<!doctype html>
<html lang="en">

    
    <head>
        
        <meta charset="utf-8" />
        <title>Thank You - {{ config('app.name') }}</title>
        
        @include('libs.meta-tags')
        
        @include('libs.styles')

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5 text-muted">
                            <a href="{{ route('dashboard') }}" class="d-block auth-logo">
                                <img src="{{ config('core.image.default.logo2d') }}" alt="" height="100" class="auth-logo-dark mx-auto">
                                <img src="{{ config('core.image.default.logo2d') }}" alt="" height="100" class="auth-logo-light mx-auto">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            
                            <div class="card-body"> 
                                
                                <div class="p-2">
                                    <div class="text-center">

                                        <div class="avatar-md mx-auto">
                                            <div class="avatar-title rounded-circle bg-light">
                                                <i class="bx bxs-badge-check h1 mb-0 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="p-2 mt-4">
                                            <h4>Thank You !</h4>
                                            <p>Thanks a lot for sharing the bus location in which you were traveling. Your <span class="font-weight-semibold">authentic contribution</span> will help us to ensure quality service.</p>
                                            <div class="mt-4">
                                                <a href="{{ route('dashboard') }}" class="btn btn-success w-md">Go to Dashboard</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <p>
                                <script>document.write(new Date().getFullYear())</script> © {{ config('app.name') }}.
                                Developed by <a href="">Snigdho</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.js"></script>

<script>
    var sesstra = sessionStorage.getItem("successTrack");
    
    if (sesstra) {
        new Noty({ 
            type:'warning', 
            layout:'bottomLeft', 
            text: 'Location sharing has been turned off !', 
            timeout: 5000
        }).show();
    }

    sessionStorage.removeItem('successTrack'); 
</script>
    