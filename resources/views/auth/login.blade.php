@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full sm:w-4/5 md:w-1/2 lg:w-1/3">
            <form action="{{ route('login') }}" method="post" class="mt-5 p-6 bg-white shadow-md rounded-md">
                @csrf
                <h3 class="text-center text-gray-800 text-2xl font-semibold">Login</h3>
                <x-input type="text" name="login" labelText="Email or Username" />
                <x-input type="password" name="password" labelText="Password" />

                <x-button type="submit" bg="gray" message="Submit" />
                <div class="text-left mt-6">
                    <a href="/register" class="text-blue-600 hover:underline">Register here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
