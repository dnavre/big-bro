<!-- Modal -->
<div class="modal fade" id="teamAdditionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Team</h4>
            </div>
            <div class="modal-body">
                <form method="put" action="{{ action('Team\TeamController@create') }}" >
                    {!! csrf_field() !!}
                    <input type="text" class="form-control" placeholder="Team name">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save team</button>
            </div>
        </div>
    </div>
</div>