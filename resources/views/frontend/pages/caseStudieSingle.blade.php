@extends('frontend.layouts.app')

@section('title', __('Case Studie Single'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.casestudiesingle.heroCaseStudieSingle')
@include('frontend.includes.casestudiesingle.heroImageCaseStudieSingle')
@include('frontend.includes.casestudiesingle.contentCaseStudie')
@include('frontend.includes.casestudiesingle.newsCaseStudieSingle')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection