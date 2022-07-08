@extends('layouts.frontend')
@section('content')
    <div class="row text-center mt-5">
        <div class="col-md-12">
        </div>
    </div>
    <div id="app" class="container">
        <div class="row">
            <div class="col-lg-2">
                <ul>
                    @foreach($categoriesList as $category)
                        <li class="list-group">{{$category->name}}</li>

                        @if($category->children)
                            @foreach($category->children as $child)
                                <a href="{{route('frontend.category-product', ['category' => $category->slug])}}">
                                    <li class="children">{{$child->name}}</li>
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-10 text-center">
                <div class="row d-flex">
                    <div class="col-sm-5">
                        <div class="product-images">
                            <div class="product-main-img">
                                <img class="img-fluid"
                                     src="images/{{$product->image ?? null}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-inner">
                            <h2 class="product-name">{{$product->name}}</h2>
                            <div class="product-inner-price">
                                <p> Cena: {{$product->price}} zł</p>
                            </div>
                                <add-product-component :product= {{$product->id}}></add-product-component>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    {{$product->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
