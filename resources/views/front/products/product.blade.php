@extends('base')


    @section('body')
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        @if(isset($category))
                            <li><a href="{{ route('front.category.slug', $category->slug) }}">{{ $category->name }}</a></li>
                        @endif
                        <li class="active">Product</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <ul id="thumbnails" class="col-md-4 list-unstyled">
                        @if(isset($product->images) && !$product->images->isEmpty())
                            @foreach($product->images as $image)
                                <li>
                                    <a href="javascript: void(0)">
                                        <img class="img-responsive img-thumbnail"
                                             src="{{ asset("$image->src") }}"
                                             alt="{{ $product->name }}" />
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    @foreach($product->images as $image)
                        <figure class="text-center product-cover-wrap col-md-8">
                            @if(isset($image->src) && $loop->first)
                                <img id="main-image" class="product-cover img-responsive"
                                     src="{{ asset("$image->src") }}?w=400"
                                     data-zoom="{{ asset("$image->src") }}?w=1200">
                            @else
                                <img id="main-image" class="product-cover" src="https://placehold.it/300x300"
                                     data-zoom="{{ asset("$image->src") }}?w=1200" alt="{{ $product->name }}">
                            @endif
                        </figure>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="product-description">
                        <h1>{{ $product->name }}
                            <small>{{ config('cart.currency') }} {{ $product->price }}</small>
                        </h1>
                        <div class="description">{!! $product->description !!}</div>
                        <div class="excerpt">
                            <hr>{!!  str_limit($product->description, 100, ' ...') !!}</div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                @include('layouts.errors-and-messages')

                                <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                    {{ csrf_field() }}
                                    @if(isset($productAttributes) && !$productAttributes->isEmpty())
                                        <div class="form-group">
                                            <label for="productAttribute">Choose Combination</label> <br />
                                            <select name="productAttribute" id="productAttribute" class="form-control select2">
                                                @foreach($productAttributes as $productAttribute)
                                                    <option value="{{ $productAttribute->id }}">
                                                        @foreach($productAttribute->attributesValues as $value)
                                                            {{ $value->attribute->name }} : {{ ucwords($value->value) }}
                                                        @endforeach
                                                        @if(!is_null($productAttribute->price))
                                                            ( {{ config('cart.currency_symbol') }} {{ $productAttribute->price }})
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    @endif

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="{{ old('quantity') }}" />
                                        <input type="hidden" name="product" value="{{ $product->id }}" />
                                    </div>
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-cart-plus"></i> Add to cart
                                    </button>
                                </form>

                                @include('layouts.comments.comments')
                             </div>
                        </div>
                    </div>

                    @include('layouts.comments.commentsoncomment')
            </div>
                </div>
    @endsection

    @section('js')
        @include('layouts.comments.js')
    @endsection
