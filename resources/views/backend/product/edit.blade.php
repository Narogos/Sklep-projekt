@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Lista produktów</a></li>
                        <li class="breadcrumb-item active">Edytuj produkt</li>
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
                                <h3 class="card-title">Edytuj produkt</h3>
                                <a href="" class="btn btn-primary">powrót</a>
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
                                        <div class="card-body">
                                            <form action="{{route('admin.product.update', $product)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                            <div class="form-group">
                                                <label for="name">Nazwa produktu</label>
                                                <input type="name" name="name" value="{{$product->name}}" class="form-control" placeholder="nazwa">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Slug</label>
                                                <input type="name" name="slug" value="{{$product->slug}}" class="form-control" placeholder="slug">
                                            </div>
                                            <div class="form-group">
                                                <label for="category"> Wybierz kategorie</label>

                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="{{$product->category->id}}" style="display: none" selected>{{$product->category->name}}</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Ilość </label>
                                                <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control" placeholder="ilość">
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Cena</label>
                                                <input type="number" name="price" value="{{$product->price}}" class="form-control" placeholder="cena">
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Zdjęcie</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <div style="max-width: 500px; max-height:500px;overflow:hidden">
                                                        <img src="{{asset("storage")}}/{{$product->image ?? null}}" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Opis</label>
                                                <textarea name="description" id="description" rows="4" class="form-control"
                                                          placeholder="opis">{{$product->description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Aktualizuj</button>
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

