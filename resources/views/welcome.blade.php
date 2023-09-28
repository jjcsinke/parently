@extends('layouts.homepage')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <img class="main-image" alt="{{ config('app.name', 'Parently') }}" src="{{ Vite::asset('resources/images/logo.svg') }}">
            <h2 class="mt-5 text-center">Share care together</h2>
        </div>
    </div>
@endsection
