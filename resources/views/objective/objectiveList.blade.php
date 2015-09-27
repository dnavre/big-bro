<form class="form-horizontal">
    @if(count($objectives))
        <?php
        $i = 0;
        ?>

        @foreach ($objectives as $objective)
        <?php $i++; ?>
        <div class="list-group-item col-xs-12">
            <label for="objective1">Objective #{{$i}} </label>
            <input type="text" value="{{$objective->name}}" class="form-control"
                   id="objective{{$objective->id}}" name="objective{{$objective->id}}" placeholder="Objective text" >
        </div>
        @endforeach
    @else
        <div class="list-group-item col-xs-12">
            <div class="alert alert-info" role="alert">Objectives list for selected schedule is empty</div>
        </div>
    @endif
</form>