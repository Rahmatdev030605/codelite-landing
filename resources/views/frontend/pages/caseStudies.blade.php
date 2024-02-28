@extends('frontend.layouts.app')

@section('title', __('Case Studies'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.product.casestudies.heroCaseStudie')
@include('frontend.includes.product.casestudies.newsCaseStudie')
@include('frontend.includes.casestudies.caseStudioBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection