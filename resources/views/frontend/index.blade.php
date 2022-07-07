@extends('layouts.frontend')
@section('content')
    <div class="row text-center mt-5">
        <div class="col-md-12">
        </div>
    </div>
    <div id="app" class="container">
        <div class="row">
            <div class="col-lg-2">
                @foreach($categoriesList as $category)
                    <li class="list-group">{{$category->name}}</li>

                    @if($category->children)
                        @foreach($category->children as $child)
                                <a href="{{route('frontend.category-product', ['category' => $category->slug ])}}">
                                    <li class="children">{{$child->name}}</li>
                                </a>
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="col-lg-10">
                <div class="row d-flex justify-content-center bg-light">
                    @foreach($products as $product)
                        <div class="col-md-6 col-sm-6 col-lg-4 mt-4 text-center">
                            <img class="img-fluid"
                                 src="https://forum.dobreprogramy.pl/uploads/default/original/3X/5/0/50514bbb032ee1b3b0b57a294839719d96894beb.jpeg">
                            <div class="content align-items-center">
                                <span> <a href="{{route('frontend.single-product', ['slugCategory' => $product->category->slug, 'product' => $product->slug ])}}">{{$product->name}}</a></span> </br>
                                </br>
                                <span> Cena: {{$product->price}} zł </span>
                                <a href="{{route('frontend.category-product', ['category' => $product->category->slug ])}}">{{$product->category->slug}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="site-section bg-light">
@endsection
