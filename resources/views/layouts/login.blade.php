@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-10 rounded-lg shadow-xl max-w-md w-full">
            <h2 class="text-3xl font-semibold text-center mb-8 text-gray-700">Login</h2>
            <form method="POST" action="{{ route('account.login') }}">
                @csrf
                <input type="email" name="email" class="w-full border rounded p-3 mb-4" placeholder="Email">
                <input type="password" name="password" class="w-full border rounded p-3 mb-4" placeholder="Password">
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700">Login</button>
            </form>
        </div>
    </div>
@endsection
