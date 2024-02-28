@extends('frontend.layouts.app')

@section('title', __('Team'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.company.team.heroTeam')
@include('frontend.includes.company.team.ourTeam1')
@include('frontend.includes.company.team.feature')
@include('frontend.includes.company.team.ourTeam2')
@include('frontend.includes.cta.ctaBlack')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection