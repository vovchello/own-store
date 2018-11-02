@extends ('base')
    @section('body')
    <div class="row row-eq-height">
        <div class="col-12 text-center">
            <h3 class="mb-3 mt-5">Корзина</h3>
            <div class=" text-right">
                <a class="btn btn-danger"
                   href="/cart/refreshCart">
                    <i class="fa fa-trash"></i>
                </a>
            </div>

        </div>

        <div class="col-md-12 content">
        <div class="box-body">
            @include('layouts.errors-and-messages')
        </div>

            <table class="table table-striped">
                <thead>
                <th class="col-md-2 col-lg-2">Cover</th>
                <th class="col-md-2 col-lg-5">Name</th>
                <th class="col-md-2 col-lg-2">Quantity</th>
                <th class="col-md-2 col-lg-1"></th>
                <th class="col-md-2 col-lg-2">Price</th>
                </thead>
                @foreach($cartItems as $cartItem)
                <tr>

                    <td>
                        {{--<a href="{{ route('front.get.product', [$cartItem->product->slug]) }}" class="hover-border">--}}
                        {{--<!--                            --}}
                        @if(isset($cartItem['cover']))
                            <img src="{{$cartItem['cover']}}" alt="{{ $cartItem['product']->name }}" class="img-responsive img-thumbnail">
                        @else
                            <img src="https://placehold.it/120x120" alt="" class="img-responsive img-thumbnail">
                        @endif

                    </td>
                    <td>
                        <h3>{{ $cartItem['product']->name }}</h3>
                        @if(isset($cartItem['product']->options))
                            @foreach($cartItem->options as $key => $option)
                                <span class="label label-primary">{{ $key }} : {{ $option }}</span>
                            @endforeach
                        @endif
                        <div class="product-description">
                            {!! $cartItem['product']->description !!}
                        </div>
                    </td>
                    <td>
                        <form action="{{ route('cart.update', $cartItem['product']->id) }}" class="form-inline" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="input-group">
                                <input type="text" name="quantity" value="{{ $cartItem['quantity'] }}" class="form-control" />
                                <span class="input-group-btn"><button class="btn btn-default">Update</button></span>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('cart.destroy', $cartItem['product']->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                        </form>
                    </td>
                    <td>{{config('cart.currency')}} {{ number_format($cartItem['product']->price, 2) }}</td>
                </tr>
                @endforeach
            </table>

        {{--<div class="container" style="height: 400px">--}}
            {{--<div class="row">--}}
                {{--<div class="col">--}}
                {{--</div>--}}
                {{--<div class="d-flex justify-content-center">--}}
                    {{--<h3>Корзина пуста</h3>--}}
                {{--</div>--}}
                {{--<div class="col">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        </div>
    </div>
@endsection
