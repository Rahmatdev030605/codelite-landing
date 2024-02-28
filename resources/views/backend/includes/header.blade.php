<!DOCTYPE html><!--
--><!-- Breadcrumb-->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('coreui/assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('coreui/assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('coreui/assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('coreui/assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('coreui/assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('coreui/assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('coreui/assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('coreui/assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('coreui/assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('coreui/assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('coreui/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('coreui/assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('coreui/assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('coreui/assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('coreui/assets/favicon/ms-icon-144x144.png') }}">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('coreui/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('coreui/css/vendors/simplebar.css') }}">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="{{ asset('coreui/css/style.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('coreui/css/examples.css') }}" rel="stylesheet">
    <link href="{{ asset('coreui/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>

    <header class="c-header c-header-light c-header-fixed">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <i class="c-icon c-icon-lg cil-menu"></i>
        </button>

        <a class="c-header-brand d-lg-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('img/brand/coreui.svg#full') }}"></use>
            </svg>
        </a>

        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
            <i class="c-icon c-icon-lg cil-menu"></i>
        </button>

        <ul class="c-header-nav d-md-down-none">
            <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('frontend.index') }}">@lang('Home')</a></li>

            @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
            <li class="c-header-nav-item dropdown">
                <x-utils.link :text="__(getLocaleName(app()->getLocale()))" class="c-header-nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />

                @include('includes.partials.lang')
            </li>
            @endif
        </ul>

        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item dropdown">
                <x-utils.link class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <x-slot name="text">
                        <div class="c-avatar">
                            <img class="c-avatar-img" src="{{ $logged_in_user->avatar }}" alt="{{ $logged_in_user->email ?? '' }}">
                        </div>
                    </x-slot>
                </x-utils.link>

                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <strong>@lang('Account')</strong>
                    </div>

                    <x-utils.link class="dropdown-item" icon="c-icon mr-2 cil-account-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                        </x-slot>
                    </x-utils.link>
                </div>
            </li>
        </ul>

        <div class="c-subheader justify-content-between px-3">
            @include('backend.includes.partials.breadcrumbs')

            <div class="c-subheader-nav mfe-2">
                @yield('breadcrumb-links')
            </div>
        </div><!--c-subheader-->
    </header>