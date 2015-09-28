@extends('layouts.master')

@section('title', $team->name)

@section('content')


    <h3>OKRs</h3>

    @include('team.okr', ['team' => $team, 'objectives' => [], 'quarter' => 1])

    <h3>Team Members</h3>

    @if(isset($teamMembers) && count($teamMembers) > 0)

    <div style="text-align: right;padding-right: 25px;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#teamMemberAdditionModal">Add a member</button>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th width="30px">#</th>
            <th>Name</th>
            <th width="230px">Added by</th>
            <th width="180px">Since</th>
            <th width="80px"></th>
        </tr>
        </thead>

        <?php $i = 0 ?>
        @foreach ($teamMembers as $tm)
            <?php $i++ ?>
            <tr>
                <td>{{ $i  }}</td>
                <td><a href="{{action('People\PeopleController@get', $tm->user->id)}}" >{{ $tm->user->name }}</a></td>
                <td>{{ $tm->creator->name }}</td>
                <td>{{ date('F d, Y', strtotime($tm->created_at)) }}</td>
                <td><button type="button" class="btn btn-danger btn-xs" onclick="removeTeamMember('{{ $team->id }}', '{{ $tm->user->id }}')"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Remove</button></td>
            </tr>
        @endforeach
    </table>
    @else
        <h4>No team members have been added to the project. Click <a href="#"  data-toggle="modal" data-target="#teamMemberAdditionModal">here</a> to add some.</h4>
    @endif

    @include('team.util.addTeamMemberModal', $team)

    <script>
        function removeTeamMember(teamId, userId) {
            $.ajax({
                url: "{{ action('Team\TeamController@removeMember') }}",
                data: {
                    user_id: userId,
                    team_id: teamId,
                    _token: '{{ csrf_token() }}'
                },
                method: "post"})
                    .success(function (event) {
                        location.reload();
                    });
        }
    </script>
@endsection