@extends('layouts.frontend-master')

@section('title', 'Register with us')

@section('content')

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Free Register</h5>
                                        <p>Grab your free {{ config('app.name') }} account now.</b></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0"> 
                            <div>
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                                
                            </div>
                            <div class="p-2">

                                @if(count($errors) > 0)
                                    <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                        <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <form class="needs-validation" action="{{ route('register') }}" method="POST" novalidate>
                                    
                                    @csrf

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter your name" name="name" value="{{ old('name') }}" required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter your name.
                                        </div>
                                    </div>
                                
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip02" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="validationTooltip02" name="email" value="{{ old('email') }}" placeholder="Enter E-mail Address" required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter valid E-mail address.
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip11" class="form-label">ID (Example: <b>IT-16028</b>)</label>
                                        <input type="text" class="form-control" id="validationTooltip11" placeholder="Enter your student ID" name="stu_id" value="{{ old('stu_id') }}" required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter your student ID.
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip12" class="form-label">Department</label>
                                        <select class="form-control select2" id="validationTooltip12" name="dept" required="">
                                        
                                            <option value="">Select Your Dept.</option>

                                            <optgroup label="Faculty of Engineering">
                                                <option value="ICT">ICT</option>
                                                <option value="CSE">CSE</option>
                                                <option value="TE">TE</option>
                                                <option value="ME">ME</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Life Science">
                                                <option value="ESRM">ESRM</option>
                                                <option value="CPS">CPS</option>
                                                <option value="FTNS">FTNS</option>
                                                <option value="BGE">BGE</option>
                                                <option value="Pharmacy">Pharmacy</option>
                                                <option value="BMB">BMB</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Business Studies">
                                                <option value="Business Administration">Business Administration</option>
                                                <option value="Management">Management</option>
                                                <option value="Accounting">Accounting</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Science">
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="MATH">MATH</option>
                                                <option value="Physics">Physics</option>
                                                <option value="STAT">STAT</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Social Science">
                                                <option value="ECO">ECO</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Arts">
                                                <option value="English">English</option>
                                            </optgroup>

                                        </select>

                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please select your Dept.
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip13" class="form-label">Session (Example: <b>2015-16</b>)</label>
                                        <select class="form-control select2" id="validationTooltip13" name="session" required="">
                                        
                                            <option value="">Select Your Session</option>

                                            <option value="2020-21">2020-21</option>
                                            <option value="2019-20">2019-20</option>
                                            <option value="2018-19">2018-19</option>
                                            <option value="2017-18">2017-18</option>
                                            <option value="2016-17">2016-17</option>
                                            <option value="2015-16">2015-16</option>
                                            <option value="2014-15">2014-15</option>
                                            <option value="2013-14">2013-14</option>
                                            <option value="2012-13">2012-13</option>
                                            <option value="2011-12">2011-12</option>
                                            <option value="2010-11">2010-11</option>
                                            <option value="2009-10">2009-10</option>
                                            <option value="2008-09">2008-09</option>
                                            <option value="2007-08">2007-08</option>
                                            <option value="2006-07">2006-07</option>
                                            <option value="2005-06">2005-06</option>
                                            <option value="2004-05">2004-05</option>
                                            <option value="2003-04">2003-04</option>
                                            <option value="2002-03">2002-03</option>
                                            <option value="2001-02">2001-02</option>
                                            <option value="2000-01">2000-01</option>
                                            <option value="1999-2000">1999-2000</option>
                                            
                                        </select>
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter your session.
                                        </div>
                                    </div>
                                
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip07" class="form-label">Password</label>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" id="validationTooltip07" name="password" value="{{ old('password') }}" aria-label="Password" aria-describedby="password-addon" placeholder="Enter Password" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter valid password.
                                            </div>
                                            
                                            <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip08" class="form-label">Re-type Password</label>
                                        
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" id="validationTooltip08" placeholder="Re-type Password" aria-label="Password" name="password_confirmation" aria-describedby="password-addon-two" onkeyup="matchPassword()" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please Re-type Password again.
                                            </div>

                                            <button class="btn btn-light" type="button" id="password-addon-two" onclick="TogglePass()"><i class="mdi mdi-eye-outline"></i></button>

                                            <div class="valid-tooltip" id="matched" style="display: none;">
                                                Password Matched!
                                            </div>

                                            <div class="invalid-tooltip" id="notmatched" style="display: none;">
                                                Password not matched yet.
                                            </div>

                                        </div>
                                    </div>

                                    <br>
                
                                    <div class="d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the {{ config('app.name') }} <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                </form>
                            </div>
        
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        
                        <div>
                            <p>© <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by Snigdho</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>  
        
        function matchPassword() {  
            var pw1 = document.getElementById("validationTooltip07").value;  
            var pw2 = document.getElementById("validationTooltip08").value;
            if($.trim(pw1) != ''){
                if($.trim(pw2) != ''){
                    if(pw1 != pw2)  
                    { 
                        $('#matched').css('display', 'none');  
                        $('#notmatched').css('display', 'block');
                    } else { 
                        $('#notmatched').css('display', 'none');
                        $('#matched').css('display', 'block');
                    }
                } else {
                    $('#notmatched').css('display', 'none');
                    $('#matched').css('display', 'none');
                }
            }
        }


        function TogglePass() {
            var temp = document.getElementById("validationTooltip08");
            if (temp.type === "password") {
                temp.type = "input";
            }
            else {
                temp.type = "password";
            }
        }
    
    </script>         
@endsection