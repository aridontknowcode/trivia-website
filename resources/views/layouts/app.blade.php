<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet" type="text/css"/>
    
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript (Popper.js and Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Style sheet --}}
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">

    {{-- JavaScript--}}
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body class="navbar-dark bg-dark" >
    @include('partials.navbar')
    
    <div class="content text-light" id="content">
        @yield('content')
    </div>

</body>
</html>