<input type="hidden" value="{{$QwithO->category_id}}" name="cat_id">
<div class="form-group row">
    <div class="col-md-3">
        <label class="pull-right">Question in English :</label>
    </div>
    <div class="col-md-9">
        <input type="text" value="{{$QwithO->question_text}}" class="form-control" name="question" placeholder="Type Question in English">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="pull-right">Question in Bangla :</label>
    </div>
    <div class="col-md-9">
        <input type="text" value="{{$QwithO->bd_question_text}}" class="form-control" name="bdquestion" placeholder="Type Question in Bangla">
    </div>
</div>
@foreach($QwithO->options as $QO)
<div class="form-group row">
    <div class="col-md-2">
        <label>Option :</label>
    </div>
    <div class="col-md-4">
        <input type="hidden" name="oid[]" value="{{$QO->id}}">
        <input type="text" value="{{$QO->option}}" class="form-control" pattern="^[a-zA-Z0-9 ]+$" name="option[]" placeholder="Option in English">
    </div>
    <div class="col-md-4">
        <input type="text" value="{{$QO->bd_option}}" class="form-control" name="bdoption[]" placeholder="Option in Bangla">
    </div>
    <div class="col-md-2">
        <div class="bt-switch">
            <input type="hidden" name="ans[]" class="hi" value="{{$QO->correct}}">
            <input type="checkbox" class="chk" data-on-text="Yes" data-off-text="No" data-size="normal" {{$QO->correct == 1?"checked":""}} />
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