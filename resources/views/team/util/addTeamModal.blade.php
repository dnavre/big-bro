<!-- Modal -->

<div class="modal fade" id="teamAdditionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="teamAdditionForm" method="post" action="{{ action('Team\TeamController@create') }}" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Team</h4>
                </div>
                <div class="modal-body form-content ">

                    {!! csrf_field() !!}

                    <div class="form-group ">
                        <label for="teamName" class="control-label" >Name</label>
                        <input id="teamName" type="text" class="form-control" placeholder="Name" name="teamName" />
                    </div>

                    <div class="form-group">
                        <label for="teamDescription" class="control-label" >Description</label>
                        <textarea id="teamDescription" class="form-control" placeholder="Description" name="description" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="teamPeriod" class="control-label" >Period, for which OKRs should be specified</label>
                        <select id="teamPeriod" class="form-control" name="period">
                            <option value="MONTH">Monthly</option>
                            <option value="QUARTER">Quarterly</option>
                        </select>
                    </div>

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