@extends('frontend.layouts.app')

@section('title', __('Pricing'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.product.pricing.heroPricing')
@include('frontend.includes.product.pricing.pricingTablePricing')
@include('frontend.includes.product.pricing.serviceAreaPricing')
@include('frontend.includes.product.pricing.faqPricing')
@include('frontend.includes.product.pricing.ourTeamPricing')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection