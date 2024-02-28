@extends('frontend.layouts.app')

@section('title', __('New Releases'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.product.newrelease.heroNewRelease')
@include('frontend.includes.product.newrelease.heroImageNewRelease')
@include('frontend.includes.product.newrelease.newRelease')
@include('frontend.includes.cta.ctaBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection