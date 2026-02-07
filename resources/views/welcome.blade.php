@extends('layouts.app')

@section('title', 'Dahlan Property | Manajemen Properti Modern')

@section('content')
    <!-- Hero Section -->
    @include('components.sections.hero')

    <!-- Features Section -->
    @include('components.sections.features')

    <!-- Property Types Section -->
    @include('components.sections.property-types')
@endsection