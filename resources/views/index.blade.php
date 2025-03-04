@extends('layouts.app')

@section('title','Administrative consults')

@section('content')
<div>
    <x-link route="consults.index" message="Manage consults"/>
    <x-link route="index" message="Manage consults"/>
</div>
@endsection
