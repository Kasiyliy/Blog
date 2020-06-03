<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client.head')
    @yield('styles')
</head>
<body>
<div id="colorlib-page">
    @include('layouts.client.leftsidebar')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-8 py-5 px-md-5">
                        <div class="row pt-md-4">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.client.rightsidebar')
                </div>
            </div>
        </section>
    </div>
</div>
@include('layouts.client.footer')
@include('layouts.client.script')
@yield('scripts')
</body>
</html>