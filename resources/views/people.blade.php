@extends('layouts.master')

@section('title', 'People')

@section('content')
<div class="row">
    <div class="col-sm-2">
    @include('people.sidebar', [
        'people' => $people
    ])
    </div>
    <div class="col-sm-6" id="okrForPerson">

    </div>
</div>
@endsection

<script type="text/javascript">
function selectPerson($url) {
    $.ajax ({
        url: $url,
        method: 'get'
    }).success(function (resp) {
        $('#okrForPerson').html(resp);
    }).error(function () {
        alert("error qaqa");
    });
}
</script>