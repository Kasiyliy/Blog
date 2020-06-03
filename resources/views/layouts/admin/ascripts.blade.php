<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
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