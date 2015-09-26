<ul class="nav nav-sidebar">
    <li @if($mainMenu == 'overview')class="active" @endif><a href="{{ action('Overview\OverviewController@show') }}">Overview <span class="sr-only">(current)</span></a></li>
    <li @if($mainMenu == 'teams')class="active" @endif><a href="{{ action('Team\TeamController@listAll') }}">Teams</a></li>
    <li @if($mainMenu == 'people')class="" @endif><a href="{{ action('People\PeopleController@listAll') }}">People</a></li>
</ul>
<ul class="nav nav-sidebar">
    <li><a href="">My OKRs</a></li>
    <li><a href="">History</a></li>
</ul>