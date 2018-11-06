<div class="container">

                    <form action="{{route('comment.store')}}" method ="post">
                        {{csrf_field()}}
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


</div>
</div>