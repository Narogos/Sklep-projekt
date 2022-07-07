@extends('layouts.frontend')
@section('content')
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
            <div class="col-lg-9">
                <cart-component></cart-component>
            </div>
        </div>
    </div>

@endsection
