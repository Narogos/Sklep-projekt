<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>

    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    @include('layouts.partials.css')
    @include('layouts.partials.script')
    @include('layouts.partials.dataTables')
</head>


<body>
    <div class="d-flex" id="wrapper">
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Panel</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.dashboard')}}">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.product.index')}}">Produkty</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.category.index')}}">Kategorie</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.order.index')}}">Zamówienia</a>
{{--                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="">Users</a>--}}
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">ki</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
                </div>
            </nav>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
