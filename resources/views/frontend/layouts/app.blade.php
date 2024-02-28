<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>

<head>

    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ appName() }} | @yield('title')</title>

    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Asep Awaludin')">

    @yield('meta')

    @stack('before-styles')

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">

    <livewire:styles />

    <!-- ========== Start Fonts Style ========== -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600&amp;family=Syne:wght@400;500;600&amp;family=Yantramanav:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

    <!-- ========== Start Stylesheet ========== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="{{ mix('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ mix('css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    <link href="{{ mix('css/responsive.css') }}" rel="stylesheet">

    <!-- ========== End Stylesheet ========== -->

    @stack('after-styles')
</head>

<body>
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')
    {{-- @include('includes.partials.announcements') --}}

    <!--app-->
    <div id="app">
        {{-- @include('frontend.includes.nav') --}}
        @include('includes.partials.messages')

        <!-- Main -->
        <main class="main-page homepage">
            @yield('content')
        </main>
    </div>

    @stack('before-scripts')

    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>

    <!-- jQuery Frameworks -->
    <script src="{{ mix('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ mix('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ mix('js/gsap.min.js') }}"></script>
    <script src="{{ mix('js/Draggable.min.js') }}"></script>
    <script src="{{ mix('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ mix('js/client-marquee.js') }}"></script>
    <script src="{{ mix('js/theme-custom.js') }}"></script>
    <script src="{{ mix('js/form1.js') }}"></script>
    <script src="{{ mix('js/subscribe-form.js') }}"></script>

    <livewire:scripts />

    @stack('after-scripts')
</body>

</html>