<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sklep</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('admin/css/styles.css') }}">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container" id="container-nav">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend.cart-index')}}">Koszyk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend.cart-index')}}">Panel</a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
@yield('content')

<footer id="footer" class="text-light bg-dark mt-3">
    <div class="container pt-4">
        <dov class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <h5>Nazwa bloga</h5>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt hic, minus eaque ad fugit esse impedit unde? Eveniet, eligendi temporibus.</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <h5>Kontakt</h5>
                <p><a href="mailto:admin@example.com">admin@example.com</a></p>
                <p>ul. Ujazdowska 0</p>
                <p>00-000 Warszawa</p>
            </div>
        </dov>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                Copyright by Shop. All rights reserved.
            </div>
        </div>
    </div>
</footer>
</body>
@include('layouts.partials.script')

<script src="{{ asset('js/app.js') }}"></script>

</html>
