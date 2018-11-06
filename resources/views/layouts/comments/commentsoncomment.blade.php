<ul class="media-list">
    <li class="media">
        </div> </div>
            <details>
{{--                {{dd($product->)}}--}}
                <summary>Коментарии</summary>
                @foreach($product->comment as $comment)
                    <div class="media-body">
                        <strong>{{$comment->user->name}}</strong>
                        <span class="text-muted">
                            <small class="text-muted">{{$comment->created_at}}</small>
                        </span>
                        <p>
                            {{$comment->description}}
                        </p>

                        <button onclick="disp(document.getElementById('{{$comment->id}}'))">Прокоментировать</button>

                        <form id="{{$comment->id}}" style="display: none;" action="{{route('comment.store')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <label for="text">Your Comment</label>
                                <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            @if(! auth()->check())
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Email</label>
                                        <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input name="name" type="name" class="form-control" id="inputPassword4" placeholder="Name">
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="name" value=" {{auth()->user()->name}}">
                                <input type="hidden" name="email" value=" {{auth()->user()->email}}">

                            @endif
                            <button type="submit" class="btn btn-primary">Comment</button>

                        </form>
                        <div class="container">
{{--                            {{dd($comment->subComment)}}--}}
                        @if($comment->subComment->first() !== null)
                                @foreach ($comment->subComment as $subComment)

                                    <strong>{{$subComment->user->name}}</strong>
                                    <span class="text-muted">
                                        <small class="text-muted">{{$subComment->created_at}}</small>
                                    </span>
                                    <p>
                                        {{$subComment->description}}
                                    </p>

                                    {{--<button onclick="disp(document.getElementById('{{$subComment->id}}'))">Прокоментировать</button>--}}

                                    {{--<form id="{{$subComment->id}}" style="display: none;" action="{{route('comment.store')}}" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" name="parent_id" value="{{ $subComment->id }}">--}}
                                        {{--<input type="hidden" name="product_id" value="{{ $product->id }}">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="text">Your Comment</label>--}}
                                            {{--<textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
                                        {{--</div>--}}
                                        {{--@if(! auth()->check())--}}
                                            {{--<div class="form-row">--}}
                                                {{--<div class="form-group col-md-6">--}}
                                                    {{--<label for="inputEmail4">Email</label>--}}
                                                    {{--<input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group col-md-6">--}}
                                                    {{--<label for="name">Name</label>--}}
                                                    {{--<input name="name" type="name" class="form-control" id="inputPassword4" placeholder="Name">--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--@else--}}
                                            {{--<input type="hidden" name="name" value=" {{auth()->user()->name}}">--}}
                                            {{--<input type="hidden" name="email" value=" {{auth()->user()->email}}">--}}

                                        {{--@endif--}}
                                        {{--<button type="submit" class="btn btn-primary">Comment</button>--}}

                                    {{--</form>--}}



                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
            </details>


    </li>
</ul>