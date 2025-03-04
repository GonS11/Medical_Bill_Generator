@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full sm:w-4/5 md:w-1/2 lg:w-1/3">
            <form action="{{ route('consults.update', $consult->id) }}"
                method="post"class="mt-5 p-6 bg-white shadow-md rounded-md">
                <h3 class="text-center text-gray-800 text-2xl font-semibold">Modify Consult</h3>
                @csrf
                @method('put')
                <x-input type="date" name="date" labelText="Date (yyyy/mm/dd)" :value="$consult->date" />
                <x-input type="text" name="hour" labelText="Hour (HH:mm:ss)" :value="$consult->hour" />
                <x-select message="Select doctor username" name="username" :options="$doctors->toArray()" value="username"
                    name="username" />
                <x-select message="Select pacient DNI" name="dni" :options="$pacients->toArray()" value="dni" />
                <x-button type="submit" bg="yellow" message="Modify consult" />
            </form>
        </div>
    </div>
@endsection
