@include('home.assetss')
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<body class="d-flex flex-column h-100 auth-Page" style="background-color: #f9f0e1;">
    <!-- ======= signup Section ======= -->
    <section class="auth ">
        <div class="container">
            <div class="row justify-content-center user-auth">
                <div class="col-12 col-md-6 col-lg-6 col-sm-10 col-xl-6">
                    <div class="text-center mb-4">
                        <a href="{{url('/')}}"><img class="auth__logo img-fluid"
                            src="{{asset('elite/images/logot.png')}}" alt="{{$settings->site_name}}"> </a>
                            @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                    </div>
                    <div class="card ">
                        <h5 class="text-center mt-3"> Create an Account</h5>

                        <form method="POST" action="{{ route('register') }}" class="mt-5 card__form">
                            {{csrf_field()}} 

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                  <label for="f_name">First Name</label>
                                  <input type="text" class="form-control mr-2" name="name" value="{{ old('name') }}" id="f_name" placeholder="Enter First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    @if ($errors->has('l_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->old('l_name') }}</strong>
                                    </span>
                                    @endif
                                  <label for="l_name">last name</label>
                                  <input type="text" class="form-control" name="l_name" value="{{ old('l_name') }}" id="l_name" placeholder="Enter last name">
                                </div>
                            </div>

                            <div class="form-group ">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="name@example.com">
                            </div>

                            <div class="form-group ">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                <label for="phone">Phone Number</label>
                                <input type="mumber" class="form-control" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Enter Phone number">
                            </div>
                            <div class="form-row">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirm-password">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" id="confirm-password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select class="form_control" name="country" id="country" required>
                                    <option disabled value="">Choose Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country}}">{{$country}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary mt-4" type="submit">Register</button>
                            </div>
    
                            <div class="text-center mb-3">
                                <small class=" text-center mb-2">Already have an Account  <a href="{{route('login')}}">Login.</a> </small>

                                <small class="text-center">&copy; Copyright  {{date('Y')}} &nbsp; {{$settings->site_name}} &nbsp; All Rights Reserved.</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>

    <!-- Wrapper Ends -->
</body>
</html>

