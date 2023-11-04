@extends('layouts.auth')

@section('content')
<div class="container-fluid h-100vh ">
    <div class="row background-white justify-content-center">
        <div class="col-md-6 col-sm-12" id="login-responsive"> 
            <div class="row justify-content-center">
                <div class="col-lg-7 mx-auto">
                    <div class="card-body pt-10">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf                                       
        
                            <h3 class="text-center login-title mb-8">{{ __('Welcome Back to') }} <span class="text-info"><a href="{{ url('/') }}">{{ config('app.name') }}</a></span></h3>
        
                            @if ($message = Session::get('success'))
                                <div class="alert alert-login alert-success"> 
                                    <strong><i class="fa fa-check-circle"></i> {{ $message }}</strong>
                                </div>
                                @endif
        
                                @if ($message = Session::get('error'))
                                <div class="alert alert-login alert-danger">
                                    <strong><i class="fa fa-exclamation-triangle"></i> {{ $message }}</strong>
                                </div>
                            @endif
                            
                            @if (config('settings.oauth_login') == 'enabled')
                                <div class="divider">
                                    <div class="divider-text text-muted">
                                        <small>{{__('Sign In with Social Media')}}</small>
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
                                        <small>{{ __('or sign in with email') }}</small>
                                    </div>
                                </div>
                            @endif
                            
        
                            <div class="input-box mb-4">                             
                                <label for="email" class="fs-12 font-weight-bold text-md-right">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="{{ __('Email Address') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror                            
                            </div>
        
                            <div class="input-box">                            
                                <label for="password" class="fs-12 font-weight-bold text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" placeholder="{{ __('Password') }}" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror                            
                            </div>
        
                            <div class="form-group mb-3">  
                                <div class="d-flex">                        
                                    <label class="custom-switch">
                                        <input type="checkbox" class="custom-switch-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">{{ __('Keep me logged in') }}</span>
                                    </label>   
        
                                    <div class="ml-auto">
                                        @if (Route::has('password.request'))
                                            <a class="text-info fs-12" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
        
                            <input type="hidden" name="recaptcha" id="recaptcha">
        
                            <div class="text-center">
                                <div class="form-group mb-0">                        
                                    <button type="submit" class="btn btn-primary font-weight-bold login-main-button">{{ __('Sign In') }}</button>              
                                </div>
            
                                @if (config('settings.registration') == 'enabled')
                                    <p class="fs-10 text-muted pt-3 mb-0">{{ __('New to ') }} <a href="{{ url('/') }}">{{ config('app.name') }}?</a></p>
                                    <a href="{{ route('register') }}"  class="fs-12 font-weight-bold">{{ __('Sign Up') }}</a> 
                                @endif
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
@endsection

@section('js')
    <!-- Tippy css -->
    <script src="{{URL::asset('plugins/tippy/popper.min.js')}}"></script>
    <script src="{{URL::asset('plugins/tippy/tippy-bundle.umd.min.js')}}"></script>
    <script>
        tippy('[data-tippy-content]', {
                animation: 'scale-extreme',
                theme: 'material',
            });
    </script>
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