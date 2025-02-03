<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Ensure full height of the page */
        html,
        body {
            height: 100%;
            margin: 0;

        }

        .container-fluid {
            height: 100%;
        }

        .row {
            height: 100%;
        }

        /* Image Section - 50% width, full height, and no overlap */
        .image-section {
            display: block;
            height: 100%;
            width: 100%;
            object-fit: cover;
            /* Ensures image covers the section */
        }

        /* Login Form Section */
        .form-section2 {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px 20px;
            background-color: #f8f9fa;
        }

        .btn-submit {
            background-color: #FBA602;
            font-weight: 700;
            color: #020302;
            border: 2px solid #FBA602;
            box-shadow: 0 0 10px rgba(251, 166, 2, 0.8);
            transition: all 0.3s ease;
            /* Smooth transition */
        }

        .btn-submit:hover {
            border: 2px solid #FBA602;
            font-weight: 700;
            background-color: black;
            color: #FBA602;
            box-shadow: 0 0 7px rgba(251, 166, 2, 1);
            /* Stronger glow on hover */
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .divider hr {
            border: 0;
            border-top: 1px solid #ccc;
            flex-grow: 1;
        }

        .divider span {
            padding: 0 10px;
            font-weight: bold;
            color: #fdfdfd;
        }

        .btn-google {
            background-color: white;
            color: #020302;
            border: 2px solid white;
            box-shadow: 0 0 7px rgb(250, 250, 250);
        }

        .btn-google:hover {
            background-color: black;
            color: rgb(255, 255, 255);
            border: 2px solid white;
        }

        .btn-facebook {
            background-color: rgb(11, 50, 177);
            color: #ffffff;
            box-shadow: 0 0 7px rgb(11, 50, 177);
        }

        .btn-facebook:hover {
            background-color: rgb(0, 0, 0);
            color: rgb(11, 50, 177);
            border: 2px solid rgb(11, 50, 177);
        }

        .form-control:focus {
            border-color: rgba(251, 166, 2, 0.8);
            /* Border color on focus */
            box-shadow: 0 0 5px rgba(251, 166, 2, 0.8);
            /* Optional: Glow effect */
            outline: none;
            /* Remove default browser outline */
        }
        
        .tx-col {
            color: #FBA602;
        }

        @media (max-width: 1201px) {
            /* Hide the image on small screens */
            .img-box {
                display: none;
            }
            .form-section2 {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Left Image Section (50% Width) -->
            <div class="col-md-6 p-0 img-box"
                style="background-image: url('{{ asset('img/banner_login.png') }}'); background-size: cover;">
                <!-- <img src="{{ asset('img/banner_login.png') }}" alt="Registration Image" class="image-section"> -->
            </div>

            <!-- Right Login Form Section (50% Width) -->
            <div class="col-md-6 form-section2" style="background-color: #020302; ">
                <form action="{{ route('account.authenticate') }}" method="post" class="w-75 text-light">
                    @csrf
                    <img src="{{ asset('img/myfuncade_logo.png') }}" alt="" width="210" class="pb-2">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <!-- Email -->
                    <div class="mb-2">
                        <label for="email" class="form-label tx-col">Email</label>
                        <input type="text" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                            placeholder="name@example.com">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">

                        <label for="password" class="form-label tx-col">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password" value="" placeholder="Password">

                        @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-submit btn-block mt-2 w-100">Login</button>
                    <p class="text-center mt-3 mb-1">Don't have an account? <a href="{{ route('account.register') }}"
                            style="color: #2BC0F4;">Register</a></p>

                    <div class="divider">
                        <hr>
                        <span>or</span>
                        <hr>
                    </div>

                    <div class="row mt-3"> <!-- Ek row banayein -->
                        <div class="col-6"> <!-- Pehla column (Google button) -->
                            <button type="button" class="btn btn-google w-100">
                                <img src="https://img.icons8.com/?size=100&id=17949&format=png&color=000000"
                                    alt="" width="20" class="mb-1">&ensp; Continue with Google
                            </button>
                        </div>
                        <div class="col-6"> <!-- Dusra column (Facebook button) -->
                            <button type="button" class="btn btn-facebook w-100 pb-2">
                                <i class="bi bi-facebook "></i>&ensp; Continue with Facebook
                            </button>
                        </div>
                        <br><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
