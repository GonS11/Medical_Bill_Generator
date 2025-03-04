@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full sm:w-4/5 md:w-1/2 lg:w-1/3">
            <form action="{{ route('users.update',$user->id) }}" method="post" class="mt-5 p-6 bg-white shadow-md rounded-md">
                <h3 class="text-center text-gray-800 text-2xl font-semibold">Modify User</h3>
                @csrf
                @method('put')
                <x-input type="text" name="name" labelText="Name" :value="$user->name" />
                <x-input type="text" name="surname" labelText="Surname" :value="$user->surname" />
                <x-input type="text" name="username" labelText="Username" :value="$user->username" />
                <x-input type="email" name="email" labelText="Email" :value="$user->email" />
                <x-input type="text" name="dni" labelText="DNI" :value="$user->dni" />
                 <x-select message="Select role" name="role" :options="['admin' => 'Admin', 'administrative' => 'Administrative', 'doctor' => 'Doctor']" />
                <x-button type="submit" bg="yellow" message="Update User" />
            </form>
        </div>
    </div>
@endsection
