@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full sm:w-4/5 md:w-1/2 lg:w-1/3">
            <form action="{{ route('consults.store') }}" method="post"class="mt-5 p-6 bg-white shadow-md rounded-md">
                <h3 class="text-center text-gray-800 text-2xl font-semibold">Create Consult</h3>
                @csrf
                <x-input type="date" name="date" labelText="Date (yyyy/mm/dd)" />
                <x-input type="text" name="hour" labelText="Hour (HH:mm:ss)" />
                <x-select message="Select doctor username" name="username" :options="$doctors->toArray()" value="username"
                    name="username" />
                <x-select message="Select doctor username" name="username" :options="$doctors->toArray()" value="username" />
                <x-select message="Select patient DNI" name="dni" :options="$pacients->toArray()" value="dni" />
                <x-button type="submit" bg="green" message="Create consult" />
            </form>
        </div>
    </div>
@endsection
