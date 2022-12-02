@extends('auth.master.main')

@section('title')
    <title>Login</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}">  
@endsection

@section('content')
<div id="auth">
        
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <img src="assets/images/logo/logo-harapan.png" alt="Logo">
                </div>
                <h2 class="mb-4">{{ __('Login') }}</h2>
                <form method="POST" action="{{ route('postlogin') }}">
                    @csrf
                    {{-- @if(session()->has('success'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{session('success')}}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif

					@if(session()->has('loginError'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{{session('loginError')}}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif --}}
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="username" type="text" name="username" class="form-control form-control-md @error('username') is-invalid @enderror" placeholder="Username" required autocomplete="username" autofocus>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('username')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left">
                        <input id="password" type="password" name="password" class="form-control form-control-md @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password" autofocus>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block btn-md shadow-lg mt-3">Log in</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right" style="background-image: url('assets/images/kursi.jpg'); backgroung-repeat: no-repeat; background-size: cover;">

            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
@endsection