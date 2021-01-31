<input type="hidden" value="{{$QwithO->category_id}}" name="cat_id">
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
    <div class="col-md-8">
        <input type="hidden" name="oid[]" value="{{$QO->id}}">
        <input type="text" value="{{$QO->option}}" class="form-control" name="option[]">
    </div>
    <div class="col-md-2">
        <div class="bt-switch">
            <input type="hidden" name="ans[]" class="hi" value="{{$QO->correct}}">
            <input type="checkbox" class="chk" name="answer[]" data-on-text="Yes" data-off-text="No" data-size="normal" {{$QO->correct == 1?"checked":""}} />
        </div>
    </div>
</div>
@endforeach

<script>
    $(function() {
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
            if (state == true) {
                $(this).closest("div.bt-switch").find(".hi").val('1');
            } else {
                $(this).closest("div.bt-switch").find("input[name='ans[]']").val('0');
            }
        });
    })
</script>