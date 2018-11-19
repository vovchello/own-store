<div class="nav-side-menu">
    {{--<div class="brand">Brand Logo</div>--}}
    {{--<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>--}}

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <div class="form-control-sm">
                    @include('layouts.sidebar.searchform')
                </div>

                {{--<li>--}}
                {{--</li>--}}
                @foreach ($categories as $category)
                    <li  data-toggle="collapse" data-target="#{{$category->name}}" class="collapsed active">
                      <a href="#"><i class="fa fa-gift fa-lg"></i>{{$category->name}}<span class="arrow"></span></a>
                    </li>
                    @if(isset($category->subCategories))
                        @foreach($category->subCategories as $subCategory)
                            <ul class="sub-menu collapse" id="{{$category->name}}">
                                <li class="active"><a href="#">{{$subCategory->name}}</a></li>
                            </ul>
                        @endforeach
                    @endif
                @endforeach
            </ul>
     </div>
</div>