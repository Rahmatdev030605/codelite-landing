@extends('frontend.layouts.app')

@section('title', __('Blog Detail'))

@section('content')
@include('frontend.includes.headerbar')
@include('frontend.includes.header')
@include('frontend.includes.company.blog.blogdetail.breadcrumbBlog')
@include('frontend.includes.company.blog.blogdetail.contentBlog')
@include('frontend.includes.company.blog.blogdetail.newsBlogDetail')
@include('frontend.includes.contact')
@include('frontend.includes.footer')
@endsection