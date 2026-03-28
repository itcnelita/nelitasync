@extends('layouts.base')

@section('title', 'Admin Panel')

@section('body')
    @include('partials.nav-admin')

    <main>
        @yield('content')
    </main>
@endsection
