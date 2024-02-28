@extends('frontend.layouts.app')

@section('title', __('Event Detail'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.company.events..eventdetail.heroEventDetail')
@include('frontend.includes.company.events.eventdetail.eventDetail')
@include('frontend.includes.cta.ctaBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection