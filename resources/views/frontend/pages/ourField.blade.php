@extends('frontend.layouts.app')

@section('title', __('Our Field'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.ourfield.heroOurField')
@include('frontend.includes.ourfield.serviceOurField')
@include('frontend.includes.ourfield.aboutServiceOurField')
@include('frontend.includes.feature.feature')
@include('frontend.includes.about.about')
@include('frontend.includes.cta.ctaSecondWhite')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection