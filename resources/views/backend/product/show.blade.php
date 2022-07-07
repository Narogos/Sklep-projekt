@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Lista produktów</a></li>
                        <li class="breadcrumb-item active">Zobacz produkt</li>
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
                                <h3 class="card-title">Zobacz produkt</h3>
                                <a href="" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-pimary">
                                <tbody>
                                <tr>
                                    <th style="width: 200px">Zdjęcie</th>
                                    <td>
                                        <div style="max-width: 500px; max-height:500px;overflow:hidden">
                                            <img src="{{asset("storage")}}/{{$product->image ?? null}}" class="img-fluid img-rounded" alt="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Produkt</th>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Slug</th>
                                    <td>{{$product->slug}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Kategoria</th>
                                    <td>{{$product->category->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Cena</th>
                                    <td>{{$product->price}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Opis</th>
                                    <td>{{$product->description}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
