@extends('layouts.app')

@section('title', 'List of system users')

@section('content')
<div class="flex justify-center items-center text-center">
    <x-list :fields="$users->toArray()"
        :buttons="[
            ['route' => 'users.edit', 'method' => 'get', 'color' => 'yellow', 'text' => 'Modify'],
            ['route' => 'users.destroy', 'method' => 'post', 'color' => 'red', 'text' => 'Delete']
        ]"
    />
</div>
@endsection
