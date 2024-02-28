@extends('frontend.layouts.app')

@section('title', __('FAQ'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.faq.heroFaq')
@include('frontend.includes.faq.faqSection')
@include('frontend.includes.about.aboutSecond')
@include('frontend.includes.cta.ctaSecondBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection