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
<script type="text/javascript">
    $(document).ready(function () {
        $('.select-person').on('click', function () {
            var self = $(this),
                url = self.data('url');

            $.ajax ({
                url: url,
                method: 'get'
            }).success(function (resp) {
                $('#okrForPerson').html(resp);
            }).error(function () {
                alert("error qaqa");
            });
        });
    });
</script>
@endsection