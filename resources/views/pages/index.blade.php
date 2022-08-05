<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Login | EI </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/skote/assets/images/favicon.png">

        <!-- Bootstrap Css -->
        <link href="{{asset('/skote/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('/skote/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('/skote/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">

            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-md-4 ms-auto">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100 px-5">

                                <div class="d-flex flex-column h-100 pt-md-5">
                                    <div class="mb-4">
                                        <a href="{{route('home')}}" class="d-block auth-logo">
                                            {{-- <img src="{{asset('/skote/assets/images/punjab-logo--g.png')}}" alt="" class="img-fluid" width="100">
                                            <img src="{{asset('/skote/assets/images/PITB-Logo.png')}}" alt="" class="img-fluid ms-4" width="90"> --}}
                                            <h2>Education Intelligence</h2>
                                        </a>
                                    </div>

                                        <div>
                                        <h2 class="text-success">Welcome</h2>
                                        <h5 class="text-muted">Education made intelligent.</h5>
                                        </div>

                                        <div class="mt-4">
                                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                @csrf
                                                @include('layouts.partials.alerts')
                                                <div class="mb-4">
                                                    <label for="cnic">Roll # / Username</label>
                                                    <input type="text" name="username" id="username" class="form-control form-control-lg" value="{{ old('cnic') }}" placeholder="Cnic / Username" min="1" maxlength="13" step="1" onKeyPress="if(this.value.length==13) return false;" autocomplete="off" autofocus required />
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>

                                                {{-- <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div> --}}
                                                <div class="row">
                                                    <!-- <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                                            <label class="form-check-label" for="remember-check">
                                                                Remember me
                                                            </label>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-6"><a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot password?</a></div>
                                                    {{-- <div class="col-6"><a href="{{ route('register') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Create Account?</a></div> --}}
                                                </div>


                                                <div class="mt-4">
                                                    <button class="btn btn-success font-size-18 waves-effect waves-light px-5" type="submit">Log In</button>
                                                </div>

                                                {{-- <div class="mt-4 text-center">
                                                    <h5 class="font-size-14 mb-3">Sign in with</h5>

                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                                <i class="mdi mdi-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                                <i class="mdi mdi-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                                <i class="mdi mdi-google"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div> --}}

                                                {{-- <div class="mt-4 text-center">
                                                    <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                                </div> --}}
                                            </form>
                                        </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        <!-- <div class="account-pages my-5 pt-sm-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">AGRI KPI</h5>
                                            <p>Log In</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('/skote/assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="{{route('home')}}" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('/skote/assets/images/favicon.png')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="{{route('home')}}" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('/skote/assets/images/favicon.png')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="cnic">CNIC</label>
                                            <input type="text" name="cnic" id="cnic" class="form-control" value="{{ old('cnic') }}" placeholder="Example: 3120212896586" min="1" maxlength="13" step="1" onKeyPress="if(this.value.length==13) return false;" autocomplete="off" autofocus required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                {{-- <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon"> --}}
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6"><a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a></div>
                                        </div>


                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                        </div>

                                        {{-- <div class="mt-4 text-center">
                                            <h5 class="font-size-14 mb-3">Sign in with</h5>

                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                        <i class="mdi mdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> --}}

                                        {{-- <div class="mt-4 text-center">
                                            <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div> --}}
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            {{-- <div>
                                <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Signup now </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div> -->
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('/skote/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('/skote/assets/js/app.js')}}"></script>
        <script>
        $(document).ready(function(){
        });

        </script>
    </body>
</html>
