@extends('layouts.auth')

@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/awselect/awselect.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    @if (config('frontend.maintenance') == 'on')			
        <div class="container h-100vh">
            <div class="row text-center h-100vh align-items-center">
                <div class="col-md-12">
                    <img src="{{ URL::asset('img/files/maintenance.png') }}" alt="Maintenance Image">
                    <h2 class="mt-4 font-weight-bold">{{ __('We are just tuning up a few things') }}.</h2>
                    <h5>{{ __('We apologize for the inconvenience but') }} <span class="font-weight-bold text-info">{{ config('app.name') }}</span> {{ __('is currenlty undergoing planned maintenance') }}.</h5>
                </div>
            </div>
        </div>
    @else
        @if (config('settings.registration') == 'enabled')
            <div class="container-fluid h-100vh ">
                <div class="row background-white justify-content-center">
                    <div class="col-md-6 col-sm-12" id="login-responsive"> 
                        <div class="row justify-content-center">
                            <div class="col-lg-7 mx-auto">
                                <div class="card-body pt-8">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf                                
                                        
                                        <h3 class="text-center login-title mb-8">{{__('Sign Up to')}} <span class="text-info"><a href="{{ url('/') }}">{{ config('app.name') }}</a></span></h3>

                                        @if (config('settings.oauth_login') == 'enabled')
                                            <div class="divider">
                                                <div class="divider-text text-muted">
                                                    <small>{{__('Continue With Your Social Media Account')}}</small>
                                                </div>
                                            </div>

                                            <div class="social-logins-box text-center">
                                                @if(config('services.facebook.enable') == 'on')<a href="{{ url('/auth/redirect/facebook') }}" class="social-login-button" id="login-facebook"><i class="fa-brands fa-facebook mr-2 fs-16"></i>{{ __('Sign In with Facebook') }}</a>@endif
                                                @if(config('services.twitter.enable') == 'on')<a href="{{ url('/auth/redirect/twitter') }}" class="social-login-button" id="login-twitter"><i class="fa-brands fa-twitter mr-2 fs-16"></i>{{ __('Sign In with Twitter') }}</a>@endif	
                                                @if(config('services.google.enable') == 'on')<a href="{{ url('/auth/redirect/google') }}" class="social-login-button" id="login-google"><i class="fa-brands fa-google mr-2 fs-16"></i>{{ __('Sign In with Google') }}</a>@endif	
                                                @if(config('services.linkedin.enable') == 'on')<a href="{{ url('/auth/redirect/linkedin') }}" class="social-login-button" id="login-linkedin"><i class="fa-brands fa-linkedin mr-2 fs-16"></i>{{ __('Sign In with Linkedin') }}</a>@endif	
                                            </div>

                                            <div class="divider">
                                                <div class="divider-text text-muted">
                                                    <small>{{ __('or register with email') }}</small>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="input-box mb-4">                             
                                            <label for="name" class="fs-12 font-weight-bold text-md-right">{{ __('Full Name') }}</label>
                                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" autofocus placeholder="{{ __('First and Last Names') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror                            
                                        </div>

                                        <div class="input-box mb-4">                             
                                            <label for="email" class="fs-12 font-weight-bold text-md-right">{{ __('Email Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off"  placeholder="{{ __('Email Address') }}" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror                            
                                        </div>

                                        <div class="input-box mb-4">                             
                                            <label for="country" class="fs-12 font-weight-bold text-md-right">{{ __('Country') }}</label>
                                            <select id="user-country" name="country" data-placeholder="{{ __('Select Your Country') }}" required>	
                                                @foreach(config('countries') as $value)
                                                    <option value="{{ $value }}" @if(config('settings.default_country') == $value) selected @endif>{{ $value }}</option>
                                                @endforeach										
                                            </select>
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror                            
                                        </div>

                                        <div class="input-box">                            
                                            <label for="password-input" class="fs-12 font-weight-bold text-md-right">{{ __('Password') }}</label>
                                            <input id="password-input" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="{{ __('Password') }}">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror                            
                                        </div>

                                        <div class="input-box">
                                            <label for="password-confirm" class="fs-12 font-weight-bold text-md-right">{{ __('Confirm Password') }}</label>                       
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="{{ __('Confirm Password') }}">                        
                                        </div>

                                        <div class="form-group mb-3">  
                                            <div class="d-flex">                        
                                                <label class="custom-switch">
                                                    <input type="checkbox" class="custom-switch-input" name="agreement" id="agreement" {{ old('remember') ? 'checked' : '' }} required>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-10 text-muted">{{__('By continuing, I agree with your')}} <a href="{{ route('terms') }}" class="text-info">{{__('Terms and Conditions')}}</a> {{__('and')}} <a href="{{ route('privacy') }}" class="text-info">{{__('Privacy Policies')}}</a></span>
                                                </label>   
                                            </div>
                                        </div>

                                        <input type="hidden" name="recaptcha" id="recaptcha">

                                        <div class="text-center">
                                            <div class="form-group mb-0">                        
                                                <button type="submit" class="btn btn-primary font-weight-bold login-main-button">{{ __('Sign Up') }}</button>              
                                            </div>                        
                                        
                                            <p class="fs-10 text-muted pt-3 mb-0">{{ __('Already have an account?') }}</p>
                                            <a href="{{ route('login') }}"  class="fs-12 font-weight-bold">{{ __('Sign In') }}</a>                                             
                                        </div>
                                    </form>
                                </div> 
                            </div>      
                        </div>
                    </div>
                        
                    <div class="col-md-6 col-sm-12 text-center background-special align-middle p-0" id="login-background">
                        <div class="login-bg">
                            <img src="{{ URL::asset('img/frontend/backgrounds/login.webp') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h5 class="text-center pt-9">{{__('New user registration is disabled currently')}}</h5>
        @endif
    @endif
@endsection

@section('js')
	<!-- Awselect JS -->
	<script src="{{URL::asset('plugins/awselect/awselect.min.js')}}"></script>
	<script src="{{URL::asset('js/awselect.js')}}"></script>

    @if (config('services.google.recaptcha.enable') == 'on')
         <!-- Google reCaptcha JS -->
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.google.recaptcha.site_key') }}"></script>
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('services.google.recaptcha.site_key') }}', {action: 'contact'}).then(function(token) {
                    if (token) {
                    document.getElementById('recaptcha').value = token;
                    }
                });
            });
        </script>
    @endif
   
@endsection
