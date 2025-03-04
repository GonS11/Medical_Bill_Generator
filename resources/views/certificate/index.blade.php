@extends('layouts.app')

@section('title', 'Medical consultation')

@section('content')
    <div class="flex justify-center items-center text-center">
        <x-list :fields="$consults->toArray()" :buttons="[
            ['route' => 'certificate.show', 'method' => 'get', 'color' => 'gray', 'text' => 'Generate Medical Certificate'],
        ]" />
    </div>
@endsection
