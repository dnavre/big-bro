<!-- Modal -->

<div class="modal fade" id="teamAdditionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="teamAdditionForm" method="post" action="{{ action('Team\TeamController@create') }}" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Team</h4>
                </div>
                <div class="modal-body">

                        {!! csrf_field() !!}
                        <input type="text" class="form-control" placeholder="Team name" name="teamName">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="saveTeamBtn" type="button" class="btn btn-primary" onclick="javascript:void(0);">Save team</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    $('#saveTeamBtn').on('click', function( event ) {

        var form = $("#teamAdditionForm").serialize();

        $.ajax({
            url: "{{ action('Team\TeamController@create') }}",
            data: form,
            method: "post"})
                .success(function (event) {
                    $('#teamAdditionModal').modal('toggle');
                    location.reload();
                });
    });

</script>