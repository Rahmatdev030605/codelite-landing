@extends('frontend.layouts.app')

@section('title', __('Careers'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.company.careers.heroCareers')
@include('frontend.includes.company.careers.serviceCareers')
@include('frontend.includes.servicearea.serviceAreaFullBlack')
@include('frontend.includes.company.careers.career')
@include('frontend.includes.about.about')
@include('frontend.includes.cta.ctaWhite')
@include('frontend.includes.company.careers.ourTeamCareer')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection