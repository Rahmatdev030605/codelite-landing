@extends('frontend.layouts.app')

@section('title', __('Contact'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.contact.heroContact')
@include('frontend.includes.contact.contactSection')
@include('frontend.includes.contact.location')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection