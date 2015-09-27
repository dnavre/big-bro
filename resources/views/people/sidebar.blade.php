<div class="row col-sm-2">
    <ul class="list-group">
        @foreach ($people as $p)
            <li class="list-group-item">This is user {{ $p->username }}</li>
        @endforeach
    </ul>
</div>