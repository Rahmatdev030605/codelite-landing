@extends('frontend.layouts.app')

@section('title', __('Features'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.product.features.heroFeature')
@include('frontend.includes.product.features.serviceFeature')
@include('frontend.includes.servicearea.serviceAreaFullWhite')
@include('frontend.includes.product.features.aboutFeature')
@include('frontend.includes.product.features.ourTeamFeature')
@include('frontend.includes.casestudies.caseStudioBlack')
@include('frontend.includes.product.features.pricingTableFeature')
@include('frontend.includes.cta.ctaBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection