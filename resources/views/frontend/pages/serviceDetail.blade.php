@extends('frontend.layouts.app')

@section('title', __('Service Detail'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.service.servicedetail.heroServiceDetail')
@include('frontend.includes.service.servicedetail.heroImageServiceDetail')
@include('frontend.includes.service.servicedetail.aboutServiceDetail1')
@include('frontend.includes.service.servicedetail.aboutServiceDetail2')
@include('frontend.includes.feature.feature')
@include('frontend.includes.testimonial.testimonial')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection