@extends('layouts.master')

@section('title', 'Teams')

@section('content')

    @if(isset($teams) && count($teams) > 0)

    <div style="text-align: right;padding-right: 25px;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#teamAdditionModal">Add a new team</button>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th width="30px">#</th>
                <th>Team</th>
                <th width="230px">Creator</th>
            </tr>
        </thead>

        <?php $i = 0 ?>
        @foreach ($teams as $t)
            <?php $i++ ?>
            <tr>
                <td>{{ $i  }}</td>
                <td>{{ $t->name }}</td>
                <td>{{ $t->creator->name }}</td>
            </tr>
        @endforeach
    </table>

    @else
    <h3>No teams have been added yet. Click <a href="#" data-toggle="modal" data-target="#teamAdditionModal">here</a> to add one.</h3>
    @endif

    @include('widgets.teamAdditionModal')
@endsection