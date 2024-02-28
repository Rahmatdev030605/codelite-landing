@extends('frontend.layouts.app')

@section('title', __('How We Do'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.howwedo.heroHowWeDo')
@include('frontend.includes.howwedo.aboutHowWeDo1')
@include('frontend.includes.howwedo.aboutHowWeDo2')
@include('frontend.includes.howwedo.featureHowWeDo')
@include('frontend.includes.howwedo.ctaHowWeDo')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection