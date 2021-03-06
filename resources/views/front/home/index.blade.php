
@extends ('base')


@section('body')
    <div class="box-body">
        @include('layouts.errors-and-messages')
    </div>
    <div class="album py-5">
        <div class="container">
            <h3 class="mb-3 mt-5">Самые популярные продукты</h3>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="{{asset($product->images->first()['src'])}}" alt="Card image cap" height="320px">
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                        {{csrf_field()}}
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="product" value="{{ $product->id }}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                <button id="add-to-cart-btn" type="submit" class="btn btn-sm btn-outline-secondary" >
                                                <i class="fa fa-shopping-cart"></i>
                                                </button>
                                    </form>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>


    {{--<div class="row row-eq-height">--}}
        {{--<div class="col-12 text-center">--}}
            {{--<h3 class="mb-3 mt-5">Самые популярные продукты</h3>--}}
        {{--</div>--}}
        {{--<div class="w-100"></div>--}}
        {{--<div class="album py-5 bg-light">--}}
        {{--<div class="container">--}}
        {{--@foreach($products as $product)--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="card mb-4 shadow-sm">--}}
                        {{--<img class="card-img-top" src="{{asset($product->images->first()['src'])}}" alt="Card image cap">--}}
                        {{--<div class="card-body">--}}
                            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
                            {{--<div class="d-flex justify-content-between align-items-center">--}}
                                {{--<div class="btn-group">--}}
                                    {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
                                    {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
                                {{--</div>--}}
                                {{--<small class="text-muted">9 mins</small>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
            {{--<div class="col-6 col-sm-3 mb-3">--}}
                {{--<div class="card text-white bg-info" style="height:100%;">--}}
                    {{--<div class="card-header" >--}}
                        {{--<p class="text-center font-weight-bold">{{ $product->name }}</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-body text-center bg-white">--}}
                        {{--<img class="img-fluid center-block card-img" alt="{{ $product->name}}"--}}
                             {{--src="{{ asset( $product->images->first()['src']) }}" style="max-height: 100px; max-width: 100px">--}}
                        {{--<h5 class="card-text mt-3 text-dark"><strong>$ {{ $product->price }}</strong></h5>--}}
                    {{--</div>--}}
                    {{--<div class="card-footer text-center bg-dark">--}}
                        {{--<a class="btn btn-light" href="#">--}}
                            {{--Детали--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-success" href="#">--}}
                            {{--<i class="fa fa-shopping-cart"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


@endsection
