

<title>@yield('judul_halaman','Admin' )</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="initial-scale=0.1">

<link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ URL::to('plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ URL::to('dist/css/adminlte.min.css') }}">
<!-- Google Font: Source Sans Pro -->
<link href="{{ URL::to('css/google.css') }}" rel="stylesheet">

<link href="{{ URL::to('plugins/froala/css/froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::to('plugins/froala/css/froala_style.min.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ URL::to('js/app.js') }}" charset="utf-8"></script>
<!-- jQuery -->
<script src="{{ URL::to('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::to('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::to('dist/js/adminlte.min.js') }}"></script>
<script type='text/javascript' src="{{ URL::to('plugins/froala/js/froala_editor.pkgd.min.js') }}"></script>
<script type="text/javascript">
	var base_url = '{{ URL::to('') }}';
</script>
@yield('header_js')
<style>
    .class3 table, td, th {
        border: 1px solid black;
    }
</style>
