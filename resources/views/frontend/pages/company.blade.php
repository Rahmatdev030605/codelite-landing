@extends('frontend.layouts.app')

@section('title', __('Company'))

@section('content')
@include('frontend.includes.header')
@include('frontend.includes.company.heroCompany')
@include('frontend.includes.client.client')
@include('frontend.includes.company.serviceCompany')
@include('frontend.includes.servicearea.serviceAreaBlack')
@include('frontend.includes.company.ourTeamCompany')
@include('frontend.includes.about.about')
@include('frontend.includes.cta.ctaBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection