<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Комментарии
                </div>
                <div class="panel-body comments">
                    <form action="{{route('comment.store')}}" method ="post">
                        {{csrf_field()}}
                        <input type="hidden" name="product" value="{{ $product->id }}">
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
                        @endif
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                </div>
                <div class="clearfix"></div>
                <hr>
                <ul class="media-list">
                    <li class="media">
                        <div class="comment">
                            <details>
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
                                            <input type="hidden" name="comment" value="{{ $comment->id }}">
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
                                            @endif
                                            <button type="submit" class="btn btn-primary">Comment</button>

                                        </form>


                                    </div>
                                    <div class="clearfix"></div>
                                @endforeach
                            </details>

                            {{--<details open="">--}}
                            {{--<summary>Even more details</summary>--}}
                            {{--<p>Here are even more details about the details.</p>--}}
                            {{--</details>--}}



                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>