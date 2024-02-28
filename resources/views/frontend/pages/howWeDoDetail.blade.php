@extends('frontend.layouts.app')

@section('title', __('How We Do Detail'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.howwedo.detailhowwedo.heroHowWeDoDetail')
@include('frontend.includes.howwedo.detailhowwedo.heroImageHowWeDoDetail')
@include('frontend.includes.howwedo.detailhowwedo.blogHowWeDoDetail')
@include('frontend.includes.about.about')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection