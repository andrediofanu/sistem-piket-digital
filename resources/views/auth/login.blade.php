<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        {{ __('Sign In') }} | Soft UI Dashboard
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nucleo-icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nucleo-svg.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7')}}" rel="stylesheet" />
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    {{-- The Navbar section from your template --}}
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('dashboard') }}">
                            Piket MAN 1 Kota Malang
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <!-- <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center me-2" href="{{ route('dashboard') }}">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('profile.edit') }}">
                                        <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                        Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('register') }}">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Sign Up
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('login') }}">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Sign In
                                    </a>
                                </li>
                            </ul>
                            {{-- Removed static buttons, typically authentication pages don't need these --}}
                        </div> -->
                    </div>
                </nav>
            </div>
        </div>
    </div>

    {{-- The main content area --}}
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">{{ __('Selamat datang kembali') }}</h3>
                                    <p class="mb-0">{{ __('Masukkan Email dan Password untuk Login') }}</p>
                                </div>
                                <div class="card-body">
                                    {{-- Start of Laravel Form --}}
                                    <form method="POST" action="{{ route('login') }}" role="form">
                                        @csrf

                                        {{-- Laravel Session Status / Error Alert (Styled with Soft UI/Bootstrap) --}}
                                        @if (session('status'))
                                            <div class="alert alert-success text-white mb-4" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        {{-- Email Address --}}
                                        <label>{{ __('Email') }}</label>
                                        <div class="mb-3">
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" aria-label="Email" required autofocus
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Password --}}
                                        <label>{{ __('Password') }}</label>
                                        <div class="mb-3">
                                            {{-- Changed type to 'password' as it was 'email' in the original template
                                            --}}
                                            <input type="password" name="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" aria-label="Password" required
                                                autocomplete="current-password">
                                            @error('password')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Remember Me (Adapted to Soft UI/Bootstrap style) --}}
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember_me">
                                            <label class="form-check-label"
                                                for="remember_me">{{ __('Remember me') }}</label>
                                        </div>

                                        {{-- Sign In Button --}}
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Log in') }}</button>
                                        </div>
                                    </form>
                                    {{-- End of Laravel Form --}}

                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        {{-- Forgot Password Link --}}
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                                class="text-secondary text-gradient font-weight-bold me-3">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif

                                        <br>

                                        {{-- Sign Up Link --}}
                                        {{ __('Belum Punya Akun?') }}
                                        <a href=""
                                            class="text-info text-gradient font-weight-bold">
                                            {{ __('Hubungi Admin Piket') }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- Background Image --}}
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url({{ asset('assets/img/curved-images/curved6.jpg')}})"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- The Footer and JS scripts from your template --}}
    <footer class="footer py-5">
        {{-- ... (Footer content omitted for brevity) ... --}}
    </footer>
    <!-- Core JS Files (Popper.js and Bootstrap MUST be loaded first) -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>


    <!-- Soft UI Dashboard Plugins (for smooth scrolling, etc.) -->
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

    <!-- The main Theme JavaScript (CRITICAL for sidebar toggling/behavior) -->
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>