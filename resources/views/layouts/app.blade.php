<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.ahead')
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.anav')
    @include('layouts.asidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('layouts.afooter')
</div>
@include('layouts.ascripts')
@yield('scripts')
</body>
</html>
