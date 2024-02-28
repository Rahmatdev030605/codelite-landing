@extends('frontend.layouts.app')

@section('title', __('Portfolio'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.portfolio.heroPortfolio')
@include('frontend.includes.portfolio.itemsPortfolio')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection