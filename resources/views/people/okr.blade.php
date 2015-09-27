<div class="panel panel-info">
    <div class="panel-heading">OKR for {{$person->name}}</div>
    <div class="panel-body">
        <div class="list-group row">
            <div class="list-group-item col-xs-12">
                <label for="inputEmail3" class="col-sm-2 control-label">Year</label>
                <div class="col-sm-4">
                    <div class="input-group">
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-default" data-value="decrease" data-target="#spinner"
                              data-toggle="spinner">
                          <span class="glyphicon glyphicon-minus"></span>
                      </button>
                  </span>
                        <input type="text" data-ride="spinner" id="spinner" class="form-control input-number"
                               value="{{date('Y')}}"
                               data-min="{{date('Y')-15}}"
                               data-max="{{date('Y')}}"
                               autocomplete="off"
                               readonly="readonly" >

                  <span class="input-group-btn">
                      <button type="button" class="btn btn-default" data-value="increase" data-target="#spinner"
                              data-toggle="spinner">
                          <span class="glyphicon glyphicon-plus"></span>
                      </button>
                  </span>
                    </div>
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label">Quarter</label>
                <div class="col-sm-4">
                    <div class="input-group">
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-default" data-value="decrease" data-target="#spinner1"
                              data-toggle="spinner">
                          <span class="glyphicon glyphicon-minus"></span>
                      </button>
                  </span>
                        <input type="text" data-ride="spinner" id="spinner1" class="form-control input-number"
                               value="{{$quarter}}"
                               data-min="1"
                               data-max="4"
                               autocomplete="off"
                               readonly="readonly" >

                  <span class="input-group-btn">
                      <button type="button" class="btn btn-default" data-value="increase" data-target="#spinner1"
                              data-toggle="spinner">
                          <span class="glyphicon glyphicon-plus"></span>
                      </button>
                  </span>
                    </div>
                </div>
            </div>
            <div id="objectivesList">

            </div>
        </div>

        <input type="hidden" name="entityId" value="{{$entity->id}}" id="entityId"/>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function () {
    $('.spinner').spinner();
    $('.spinner1').spinner();
    $('#spinner, #spinner1').on('change', function () {
        var data = {
            'year': $('#spinner').val(),
            'quarter': $('#spinner1').val(),
            'entityId': $('#entityId').val(),
            '_token': '{!! csrf_token() !!}'
        };

        $.ajax ({
            url: "{{ action('Objective\ObjectiveController@getByEntity') }}",
            data: data,
            method: 'post'
        }).success(function (resp) {
            $('#objectivesList').html(resp);
        }).error(function () {
            alert("ersssror qaqa");
        });
    });
});
</script>