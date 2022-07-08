@extends('layouts.frontend')
@section('content')
    <div class="row text-center mt-5">
        <div class="col-md-12">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @foreach($categoriesList as $category)
                        <li class="children">{{$category->name}}</li>
                    @if($category->children)
                        @foreach($category->children as $child)
                            <a href="{{route('frontend.category-product', ['category' => $child->slug])}}">
                                <li style="margin-left: 10px; margin-top: 5px;">{{$child->name}}</li>
                            </a>
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="col-lg-9">
                <div class="row d-flex justify-content-center bg-light">
                    @foreach($categories as $category)
                        @foreach($category->products as $item)
                            <div class="col-md-6 col-sm-6 col-lg-4 mt-4 text-center">
                                <img class="img-fluid"
                                     src="images/{{$item->image ?? null}}">
                                <div class="content align-items-center">
                                    <span><a href="{{route('frontend.single-product',['slugCategory' => $category->name, 'product' => $item->slug ?? 'as'])}}">{{$item->name}}</a></span> </br>
                                    <span> Cena: {{$item->price}} zł </span>   </br>
                                </div>
                            </div>
                      @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
