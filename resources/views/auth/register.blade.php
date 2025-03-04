@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full sm:w-4/5 md:w-1/2 lg:w-1/3">
            <form action="{{ route('register') }}" method="post" class="mt-5 p-6 bg-white shadow-md rounded-md">
                <h3 class="text-center text-gray-800 text-2xl font-semibold">Register</h3>
                @csrf
                <x-input type="text" name="name" labelText="Name" />
                <x-input type="text" name="surname" labelText="Surname" />
                <x-input type="text" name="username" labelText="Username" />
                <x-input type="email" name="email" labelText="Email" />
                <x-input type="text" name="dni" labelText="DNI" />
                <x-input type="password" name="password" labelText="Password" />
                <x-input type="password" name="password_confirmation" labelText="Confirm password" />
                <x-select message="Select role" name="role" :options="['administrative' => 'Administrative', 'doctor' => 'Doctor']" />
                <x-button type="submit" bg="gray" message="Register" />
                <div class="text-left mt-6">
                    <a href="/login" class="text-blue-600 hover:underline">Login here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
