@extends('frontend.layouts.app')

@section('title', __('Partners'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.company.partners.heroPartners')
@include('frontend.includes.client.client')
@include('frontend.includes.company.partners.servicePartners')
@include('frontend.includes.company.partners.partners')
@include('frontend.includes.company.partners.aboutPartners')
@include('frontend.includes.cta.ctaBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection