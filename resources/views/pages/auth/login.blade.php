@extends('layouts.auth')
@section('styles')
<style>
    .app-logo {

    }
    .bg-login {
        height: 100vh;
        width: 100vw;
        background-image: url('assets/images/originals/citynights.jpg');
        background-size: cover;
    }
</style>
@endsection

@section('content')
    <div class="app-container">
        <div class="h-100">
            <div class="h-100 no-gutters row">
                <div class="d-none d-lg-block d-md-block col-md-8 col-lg-9">
                    <div class="slider-light">
                        <div class="slick-slider">
                            <div>
                                <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                    <div class="bg-login"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-4 col-lg-3">
                    <div class="mx-auto app-login-box col-sm-12 col-md-12 col-lg-12">
                        <div class="app-logo">
                            {{-- <img class="mx-auto" src="{{ asset('assets/images/logo-inverse.png') }}" alt="" style="height: 30px; "> --}}
                        </div>
                        <h4 class="mb-0">
                            <span class="d-block">Welcome back,</span>
                            <span>Please sign in to your account.</span>
                        </h4>
                        {{-- <h6 class="mt-3">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6> --}}
                        <div class="divider row"></div>
                        <div>
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email..." required autocomplete="email">
                                            {{-- <input name="email" id="exampleEmail" placeholder="Email here..." type="email" class="form-control"> --}}
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword" class="">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password..." required autocomplete="current-password">
                                            {{-- <input name="password" id="examplePassword" placeholder="Password here..." type="password" class="form-control"> --}}
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative form-check">
                                    <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                    <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                                </div>
                                <div class="divider row"></div>
                                <div class="d-flex align-items-center">
                                    <div class="ml-auto">
                                        <a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                                        <button class="btn btn-primary btn-lg">Login to Dashboard</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
