@extends('frontend.layouts.app')

@section('title', __('Overview'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.product.overview.heroOverview')
@include('frontend.includes.product.overview.serviceOverview')
@include('frontend.includes.servicearea.serviceAreaFullWhite')
@include('frontend.includes.product.overview.aboutOverview')
@include('frontend.includes.product.overview.ourTeamOverview')
@include('frontend.includes.casestudies.caseStudioBlack')
@include('frontend.includes.product.overview.pricingTable')
@include('frontend.includes.cta.ctaBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection