<div class="panel panel-info">
    <div class="panel-heading">OKR for {{$person->name}}</div>
    <div class="panel-body">
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

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    <p class="help-block">Lorem ipsum dolor sit amet</p>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-3 control-label">File</label>
                <div class="col-sm-9">
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Active
                        </label>
                    </div>
                    <p class="help-block">Lorem ipsum dolor sit amet</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Choices</label>
                <div class="col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="optionsRadios" id="optionsCheckbox1" value="option1" checked="">
                            Option one is this and that—be sure to include why it's great
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="optionsRadios" id="optionsCheckbox2" value="option2">
                            Option two can be something else and selecting it will deselect option one
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Sex</label>
                <div class="col-sm-9">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Female
                        </label>
                    </div>
                    <p class="help-block">Lorem ipsum dolor sit amet</p>
                </div>
            </div>

            <button type="submit" class="btn btn-default">Create User</button>
        </form>


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
            '_token': '{!! csrf_token() !!}'
        };

        $.ajax ({
            url: "{{ action('People\PeopleController@objectives') }}",
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