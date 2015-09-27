@extends('layouts.master')

@section('title', 'People')

@section('content')
<div class="row">
    @include('people.sidebar', [
        'people' => $people
    ])
</div>
@endsection