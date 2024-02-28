@if (session('success'))
    <div id="successMessage" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="errorMessage" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
