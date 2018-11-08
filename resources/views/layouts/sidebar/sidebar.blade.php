{{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
{{--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
<!------ Include the above in your HEAD tag ---------->


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>
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

                {{--<li data-toggle="collapse" data-target="#service" class="collapsed">--}}
                  {{--<a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>--}}
                {{--</li>--}}
                {{--<ul class="sub-menu collapse" id="service">--}}
                  {{--<li>New Service 1</li>--}}
                  {{--<li>New Service 2</li>--}}
                  {{--<li>New Service 3</li>--}}
                {{--</ul>--}}


                {{--<li data-toggle="collapse" data-target="#new" class="collapsed">--}}
                  {{--<a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>--}}
                {{--</li>--}}
                {{--<ul class="sub-menu collapse" id="new">--}}
                  {{--<li>New New 1</li>--}}
                  {{--<li>New New 2</li>--}}
                  {{--<li>New New 3</li>--}}
                {{--</ul>--}}


                 {{--<li>--}}
                  {{--<a href="#">--}}
                  {{--<i class="fa fa-user fa-lg"></i> Profile--}}
                  {{--</a>--}}
                  {{--</li>--}}

                 {{--<li>--}}
                  {{--<a href="#">--}}
                  {{--<i class="fa fa-users fa-lg"></i> Users--}}
                  {{--</a>--}}
                {{--</li>--}}
            </ul>
     </div>
</div>