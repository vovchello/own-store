    <nav class="navbar navbar-expand-lg navbar-dark bg-dark header">
        <div class="container">
            <a class="navbar-brand" href="/">PracticeShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            @foreach($categories as $subCategory)
                                <a class="dropdown-item" href="#">{{$subCategory->name}}</a>
                            @endforeach

                        </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Популярные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('plan')}}">Планы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.index')}}"><i class="fa fa-shopping-cart"> Корзина</i></a>
                    </li>
                </ul>
            </div>
                    <div class = "pull-right">
                        <ul class = "nav navbar-nav navbar-right">
                            @if(auth()->check())
                            {{--<li><a href="#{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home"></i> My Account</a></li>--}}
                            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}"><i class="fa fa-sign-in"> {{__('auth.login')}}</i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('register')}}"><i class="fa fa-sign-in"> {{__('auth.registration')}}</i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
        </div>
    </nav>
