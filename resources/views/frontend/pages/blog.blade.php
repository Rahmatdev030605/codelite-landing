@extends('frontend.layouts.app')

@section('title', __('Blog'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.company.blog.heroBlog')
@include('frontend.includes.company.blog.newsBlog')
@include('frontend.includes.featuresection.featureSection')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection