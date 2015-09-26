@extends('layouts.master')

@section('title', 'Teams')

@section('content')

    @if(isset($teams) && count($teams) > 0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th width="30px">#</th>
                <th>Team</th>
            </tr>
        </thead>

        <tr></tr>
    </table>
    @else
    <h3>No teams have been added yet. Click <a href="#" data-toggle="modal" data-target="#teamAdditionModal">here</a> to add one.</h3>
    @endif

    @include('widgets.teamAdditionModal')
@endsection