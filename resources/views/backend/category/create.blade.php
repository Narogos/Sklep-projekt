@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Kategorie</a></li>
                        <li class="breadcrumb-item active">Dodaj kategorie</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Dodaj kategorie</h3>
                                <a href="" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Nazwa</label>
                                                <input type="name" name="name" class="form-control" id="name" placeholder="nazwa">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Dodaj</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
