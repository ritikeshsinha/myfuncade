@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-10 rounded-lg shadow-xl max-w-md w-full">
            <h2 class="text-3xl font-semibold text-center mb-8 text-gray-700">Register</h2>
            <form method="POST" action="{{ route('account.register') }}">
                @csrf
                <input type="text" name="name" class="w-full border rounded p-3 mb-4" placeholder="Full Name">
                <input type="email" name="email" class="w-full border rounded p-3 mb-4" placeholder="Email">
                <input type="password" name="password" class="w-full border rounded p-3 mb-4" placeholder="Password">
                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded hover:bg-green-700">Register</button>
            </form>
        </div>
    </div>
@endsection
