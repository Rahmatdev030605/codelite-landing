@extends('frontend.layouts.app')

@section('title', __('About Us'))

@section('content')

@include('frontend.includes.header')
@include('frontend.includes.company.about.heroAbout')
@include('frontend.includes.client.client')
@include('frontend.includes.company.about.serviceAbout')
@include('frontend.includes.servicearea.serviceAreaBlack')
@include('frontend.includes.company.about.ourTeamAbout')
@include('frontend.includes.about.about')
@include('frontend.includes.cta.ctaBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection