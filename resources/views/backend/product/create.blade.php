@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Lista produktów</a></li>
                        <li class="breadcrumb-item active">Dodaj produkt</li>
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
                                <h3 class="card-title">Dodaj produkt</h3>
                                <a href="" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Nazwa produktu</label>
                                                <input type="name" name="name" value="" class="form-control" placeholder="nazwa">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Slug</label>
                                                <input type="name" name="slug" value="" class="form-control" placeholder="slug">
                                            </div>
                                            <div class="form-group">
                                                <label for="category"> Wybierz kategorie</label>

                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="" style="display: none" selected>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                                <div class="form-group">
                                                    <label for="title">Ilość </label>
                                                    <input type="number" name="quantity" value="" class="form-control" placeholder="ilość">
                                                </div>

                                                <div class="form-group">
                                                    <label for="title">Cena</label>
                                                    <input type="number" name="price" value="" class="form-control" placeholder="cena">
                                                </div>
                                            <div class="form-group">
                                                <label for="image">Zdjęcie</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Opis</label>
                                                <textarea name="description" id="description" rows="4" class="form-control"
                                                          placeholder="opis"></textarea>
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

