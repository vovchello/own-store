<form action="{{ route('search.product') }}" class="form-row" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form" name="search" id="search" placeholder="Search" value="Search" />
            <button type="submit">Search
            </button>
        </div>
        <div class="btn-group btn-group-sm" role="group" aria-label="...">

        </div>

</form>


