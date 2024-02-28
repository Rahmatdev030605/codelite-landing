@extends('frontend.layouts.app')

@section('title', __('Bussiness Consulting'))

@section('content')
@include('frontend.includes.home.business.headerSecond')
@include('frontend.includes.home.business.heroSecond')
@include('frontend.includes.home.business.clientSecond')
@include('frontend.includes.home.business.services')
@include('frontend.includes.home.business.aboutSecond')
@include('frontend.includes.home.business.featureSecond')
@include('frontend.includes.home.business.newsSecond')
@include('frontend.includes.home.business.portfolio')
@include('frontend.includes.home.business.ourTeam')
@include('frontend.includes.home.business.testimonialSecond')
@include('frontend.includes.home.business.contactSecond')
@include('frontend.includes.footer')
@endsection