@extends('layouts.app')

@section('title', 'Medical consultation')

@section('content')
    <div class="flex justify-center items-center text-center">
        <x-list :fields="$consults->toArray()" :buttons="[
            ['route' => 'consults.edit', 'method' => 'get', 'color' => 'yellow', 'text' => 'Modify'],
            ['route' => 'consults.destroy', 'method' => 'post', 'color' => 'red', 'text' => 'Delete'],
            ['route' => 'consults.show', 'method' => 'get', 'color' => 'gray', 'text' => 'Generate Medical Bill'],
        ]" />
    </div>
@endsection
