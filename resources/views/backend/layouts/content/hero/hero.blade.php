@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        @include('backend.layouts.content.hero.includes.header')
        <div class="card-body">
            <div class="container">
                <!-- Bagian Search Form -->
                <div class="container-fluid mb-3">
                    <div class="row align-items-center">

                    </div>
                </div>

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                    </div>

                    <div>
                        @livewire('backend.hero-table', ['searchable' => 'title,heading,description'])
                    </div>

                </div>

            </div>
        </div>
    </div>
    @endsection
