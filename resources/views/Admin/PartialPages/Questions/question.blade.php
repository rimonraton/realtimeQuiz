<input type="hidden" value="{{$QwithO->category_id}}" name="cat_id">
<div class="form-group row">
    <div class="col-md-3">
        <label class="pull-right">{{__('form.question_en')}} :</label>
    </div>
    <div class="col-md-9">
        <input type="text" value="{{$QwithO->question_text}}" class="form-control" name="question" placeholder="{{__('form.question_placeholder')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="pull-right">{{__('form.question_bn')}} :</label>
    </div>
    <div class="col-md-9">
        <input type="text" value="{{$QwithO->bd_question_text}}" class="form-control" name="bdquestion" placeholder="{{__('form.question_placeholder')}}">
    </div>
</div>
@foreach($QwithO->options as $QO)
<div class="form-group row">
    <div class="col-md-2">
        <label>{{__('form.option')}} :</label>
    </div>
    <div class="col-md-4">
        <input type="hidden" name="oid[]" value="{{$QO->id}}">
        <input type="text" value="{{$QO->option}}" class="form-control" name="option[]" placeholder="{{__('form.option_en_placholder')}}">
    </div>
    <div class="col-md-4">
        <input type="text" value="{{$QO->bd_option}}" class="form-control" name="bdoption[]" placeholder="{{__('form.option_bn_placholder')}}">
    </div>
    <div class="col-md-2">
        <div class="bt-switch">
            <input type="hidden" name="ans[]" class="hi" value="{{$QO->correct}}">
            <input type="checkbox" class="chk" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$QO->correct == 1?"checked":""}} />
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