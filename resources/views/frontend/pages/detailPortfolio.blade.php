@extends('frontend.layouts.app')

@section('title', __('Portfolio Detail'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.portfolio.portfoliodetail.heroPortfolioDetail')
@include('frontend.includes.portfolio.portfoliodetail.heroImagePortfolioDetail')
@include('frontend.includes.portfolio.portfoliodetail.contentPortfolioDetail')
@include('frontend.includes.cta.ctaBlack')
@include('frontend.includes.portfolio.portfoliodetail.projectPortfolio')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection