<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.admin.ahead')
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.admin.anav')
    @include('layouts.admin.asidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('layouts.admin.afooter')
</div>
@include('layouts.admin.ascripts')
@yield('scripts')
</body>
</html>
