     <footer class="c-footer">
    <div>
        <strong>
            @lang('Copyright') &copy; {{ date('Y') }}
            <x-utils.link href="http://laravel-boilerplate.com" target="_blank" :text="__(appName())" />
        </strong>

        @lang('All Rights Reserved')
    </div>

    <div class="mfs-auto">
        @lang('Powered by')
        <x-utils.link href="http://laravel-boilerplate.com" target="_blank" :text="__(appName())" /> &
        <x-utils.link href="https://coreui.io" target="_blank" text="CoreUI" />
    </div>
</footer>
<script src="{{ asset('coreui/js/admin.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- CoreUI and necessary plugins-->
<script src="{{ asset('coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>
<!-- Plugins and scripts required by this view-->
<script src="{{ asset('coreui/vendors/chart.js/js/chart.min.js') }}"></script>
<script src="{{ asset('coreui/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
<script src="{{ asset('coreui/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
<script src="{{ asset('coreui/js/main.js') }}"></script>
<script>
</script>
