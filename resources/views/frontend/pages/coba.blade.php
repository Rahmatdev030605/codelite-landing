@extends('frontend.layouts.app')

@section('title', __('Company'))

@section('content')
@include('frontend.includes.header')
@include('frontend.includes.cobaaAPI.cobaApi')
@endsection