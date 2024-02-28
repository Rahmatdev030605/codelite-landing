@extends('frontend.layouts.app')

@section('title', __('Solutions'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.product.solution.heroSolution')
@include('frontend.includes.product.solution.serviceSolution')
@include('frontend.includes.servicearea.serviceAreaFullWhite')
@include('frontend.includes.casestudies.caseStudioWhite')
@include('frontend.includes.aboutsection.aboutSection')
@include('frontend.includes.about.aboutSecond')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection