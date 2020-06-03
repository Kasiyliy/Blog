<script src="{{asset('client/js/jquery.min.js')}}"></script>
<script src="{{asset('client/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('client/js/popper.min.js')}}"></script>
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('client/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('client/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('client/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('client/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('client/js/aos.js')}}"></script>
<script src="{{asset('client/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('client/js/scrollax.min.js')}}"></script>
<script src="{{asset('client/js/main.js')}}"></script><script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    toastr.options.closeButton = true;
    @if(session()->has('success'))
    toastr.success("{{session()->get('success')}}");
    @endif

    @if(session()->has('info'))
    toastr.info("{{session()->get('info')}}");
    @endif

    @if(session()->has('error'))
    toastr.info("{{session()->get('error')}}");
    @endif

    @if(session()->has('warning'))
    toastr.info("{{session()->get('warning')}}");
    @endif
</script>
