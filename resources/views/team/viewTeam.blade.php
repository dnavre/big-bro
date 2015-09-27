@extends('layouts.master')

@section('title', $team->name)

@section('content')

    <h3>Team Members</h3>

    @if(isset($teamMembers) && count($teamMembers) > 0)
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="30px">#</th>
            <th>Name</th>
            <th width="230px">Added by</th>
        </tr>
        </thead>

        <?php $i = 0 ?>
        @foreach ($teamMembers as $tm)
            <?php $i++ ?>
            <tr>
                <td>{{ $i  }}</td>
                <td><a href="{{action('People\PeopleController@get', $tm->user->id)}}" >{{ $tm->user->name }}</a></td>
                <td>{{ $tm->creator->name }}</td>
            </tr>
        @endforeach
    </table>
    @else
        <h4>No team members have been added to the project. Click <a href="#"  data-toggle="modal" data-target="#teamMemberAdditionModal">here</a> to add some.</h4>
    @endif

    @include('widgets.addTeamMemberModal', $team)
@endsection