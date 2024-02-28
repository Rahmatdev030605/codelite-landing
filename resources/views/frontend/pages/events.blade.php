@extends('frontend.layouts.app')

@section('title', __('Events'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.company.events.heroEvent')
@include('frontend.includes.company.events.events')
@include('frontend.includes.cta.ctaSecondBlack')
@include('frontend.includes.company.events.abouEvent')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection