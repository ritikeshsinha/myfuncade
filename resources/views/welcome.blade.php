@extends('layouts.app')

@section('title', 'Play Fun game')

@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .jumbotron {
            background: url('https://via.placeholder.com/1500x500') no-repeat center center;
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }

        .game-card {
            transition: transform 0.2s;
        }

        .game-card:hover {
            transform: scale(1.05);
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }
    </style>
    <!-- Jumbotron Header -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Welcome to Funcade!</h1>
            <p class="lead">Play the best online games for free. Join the fun now!</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Get Started</a>
        </div>
    </div>

    <!-- Game Cards Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card game-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Game 1">
                    <div class="card-body" location.href='{{'/>tik_tac_toe'}}'>
                        <h5 class="card-title">Tik tak toe</h5>
                        <p class="card-text">Playing time</p>
                        <a href="{{'/tik_tac_toe'}}" class="btn btn-primary">Play Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card game-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Game 2">
                    <div class="card-body">
                        <h5 class="card-title">Game 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Play Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card game-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Game 3">
                    <div class="card-body">
                        <h5 class="card-title">Game 3</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Play Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Main Content Section -->
    <main class="flex justify-center items-center h-screen px-4">
        <div class="bg-white p-10 rounded-lg shadow-xl max-w-md w-full">
            <h2 class="text-3xl font-semibold text-center mb-8 text-gray-700">Get Started</h2>

            <div class="text-center">
                <a href="{{ route('account.login') }}" class="bg-blue-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-200 transform hover:scale-105 mb-4 block">Log In</a>
                <p class="text-sm text-gray-500">Or</p>
                <a href="{{ route('account.register') }}" class="bg-green-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-green-700 transition duration-200 transform hover:scale-105 mt-4 block">Register</a>
            </div>
        </div>
    </main> --}}
     <!-- Bootstrap JS and dependencies -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
