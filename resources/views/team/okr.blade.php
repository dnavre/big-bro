
<form class="form-horizontal" role="form">
    <div class="form-group">
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
    <input type="hidden" name="personId" value="{{$team->id}}" id="personId"/>
</form>

<form>
    <div class="form-group">
        <label for="objective1">Objective #1</label>
        <input type="text" class="form-control" id="objective1" placeholder="Objective" value="Improve Java knowledge">
    </div>
    <div class="form-group">
        <label for="objective2">Objective #2</label>
        <input type="text" class="form-control" id="objective2" placeholder="Objective" value="Do more front-end tasks">
    </div>

    <div class="col-sm-offset-2 col-sm-10" style="text-align: right;">
        <button type="submit" class="btn btn-success">Add Objective</button>
    </div>
</form>

<script type="text/javascript">

$(document).ready(function () {
    $('.spinner').spinner();
    $('.spinner1').spinner();
    $('#spinner, #spinner1').on('change', function () {
        var data = {
            'year': $('#spinner').val(),
            'quarter': $('#spinner1').val(),
            'personId': $('#personId').val(),
            '_token': '{!! csrf_token() !!}'
        };

        $.ajax ({
            url: " action('Team\TeamController@objectives') ",
            data: data,
            method: 'post'
        }).success(function (resp) {
            alert("successs qaqa");
        }).error(function () {
            alert("ersssror qaqa");
        });
    });
});
</script>