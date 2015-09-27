<div class="list-group">
    @foreach ($people as $p)
        <a href="#"
           class="select-person list-group-item "
           data-url="{{ action('People\PeopleController@get', ['id' => $p->id]) }}">
            {{ $p->name }}
        </a>
    @endforeach
</div>