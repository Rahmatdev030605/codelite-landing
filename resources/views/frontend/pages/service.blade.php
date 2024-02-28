@extends('frontend.layouts.app')

@section('title', __('Services'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.service.heroService')
@include('frontend.includes.servicearea.serviceAreaFullWhite')
@include('frontend.includes.casestudies.caseStudioWhite')
@include('frontend.includes.aboutsection.aboutSection')
@include('frontend.includes.about.aboutSecond')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection