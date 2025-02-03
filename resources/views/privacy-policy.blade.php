@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
    <div class="container mx-auto py-12 px-6">
        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="inline-block bg-gray-700 text-white px-6 py-3 rounded-md shadow-md hover:bg-gray-800 transition duration-200">
            ← Back
        </a>
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Privacy Policy</h1>

        <p class="text-gray-600 mb-8">
            This is the Privacy Policy page. Here, you can describe how user data is handled and protected.
        </p>
    </div>
@endsection
