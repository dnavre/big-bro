<!-- Modal -->

<div class="modal fade" id="teamMemberAdditionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="teamMemberAdditionForm" method="post" action="{{ action('Team\TeamController@addMember') }}" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Adding a team member to <strong>{{ $team->name }}</strong></h4>
                </div>
                <div class="modal-body">

                    {!! csrf_field() !!}

                    <p>Please be warned that this is an irreversible change, you want' be able to clean this step from the history of the team.</p>

                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <input type="hidden" name="teamId" value="{{ $team->id }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="addTeamMember" type="button" class="btn btn-primary" onclick="javascript:void(0);">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    $('#addTeamMember').on('click', function( event ) {

        var form = $("#teamMemberAdditionForm").serialize();

        $.ajax({
            url: "{{ action('Team\TeamController@addMember') }}",
            data: form,
            method: "post"})
                .success(function (event) {
                    $('#teamMemberAdditionModal').modal('toggle');
                    location.reload();
                });
    });

</script>