<div class="form-group row">
    <div class="col-md-2">
        <label class="pull-right">Question :</label>
    </div>
    <div class="col-md-9">
        <input type="text" value="{{$QwithO->question_text}}" class="form-control" name="question">
    </div>
</div>
@foreach($QwithO->options as $QO)
<div class="form-group row">
    <div class="col-md-2">
        <label>Option :</label>
    </div>
    <div class="col-md-9">
        <input type="hidden" name="oid[]" value="{{$QO->id}}">
        <input type="text" value="{{$QO->option}}" class="form-control" name="option[]">
    </div>
</div>
@endforeach