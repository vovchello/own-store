
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
                            <p class="card-text">{{$product->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                        {{csrf_field()}}
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="product" value="{{ $product->id }}">
                                            <a href = "{{route('front.get.product',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
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
@endsection
