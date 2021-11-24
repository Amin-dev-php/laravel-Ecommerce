@extends('admin.layouts.master')

@section('head')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection

@section('content')
<section class="content">
    <div style="height: 600px;">
        <div id="fm"></div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endsection
<head>


</head>
<body>




</body>
</html>
