<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makobat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Favicons -->
    <link href="user/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="user/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="user/vendor/aos/aos.css" rel="stylesheet">
    <link href="user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="user/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="user/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="user/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="user/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="user/css/style.css" rel="stylesheet">
</head>
<body class="body-login">

<div class="container" data-aos="zoom-in-up">
        <div class="card-login">
            <img src="user/img/login_right.jpg"  class="card-img" alt="...">
            <div class="card-img-overlay p-0">
                <div class=row>
                    <div class="col p-0">
                        <div class="card-auth">
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <img src="user/img/login_up.jpg" class="card-img-top" alt="...">
                            <div class="card-body login-body">

                                    <h4 align="center" class="logo me-auto">Login</h4>

                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-floating mb-3">
                                        <input name="email" type="email" class="input-login form-control @error ('email') is-invalid @enderror" id="email" placeholder="email" required :value="old('email')">
                                        <label for="email" value="{{ __('Email') }}">Email</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input name="password" type="password" class="input-login form-control" id="password" placeholder="Password" required>
                                        <label for="password" value="{{ __('Password') }}">Password</label>
                                    </div>

                                    <div class="row">
                                        <div class="col">

                                        </div>
                                        <div class="col">
                                            <div class="d-grid">
                                                <button class="btn btn-login text-uppercase fw-bold" type="submit">Login</button><br>
                                            </div>
                                        </div>
                                        <div class="col">

                                        </div>
                                    </div>

                                    </form>

                                    <div class="d-flex justify-content-center">
                                        <p>Lupa Password?<a href="/registeration"> Klik Disini</a> untuk menghubungi Administrator</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col right-l">
                                <h1>Welcome to Makobat,</h1>
                                <h4>Please Login to Continue</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <img src="user/img/logo.png" class="img-fluid low-l" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

</div>

</body>

<!-- Vendor JS Files -->
<script src="user/vendor/purecounter/purecounter.js"></script>
<script src="user/vendor/aos/aos.js"></script>
<script src="user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="user/vendor/swiper/swiper-bundle.min.js"></script>
<script src="user/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="user/js/main.js"></script>
</html>

{{--

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
