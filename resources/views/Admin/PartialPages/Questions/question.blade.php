<input type="hidden" id="ucat_id" value="{{$QwithO->category_id}}" name="cat_id">
<div class="form-group row">
    <div class="col-md-3">
        <label class="pull-right">{{__('form.question_en')}} :</label>
    </div>
    <div class="col-md-9">
        <input type="text" id="uquestion" value="{{$QwithO->question_text}}" class="form-control" name="question" placeholder="{{__('form.question_placeholder')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="pull-right">{{__('form.question_bn')}} :</label>
    </div>
    <div class="col-md-9">
        <input type="text" id="ubdquestion" value="{{$QwithO->bd_question_text}}" class="form-control" name="bdquestion" placeholder="{{__('form.question_placeholder')}}">
    </div>
</div>
@foreach($QwithO->options as $QO)
<div class="form-group row" id="op_{{$QO->id}}">
    <div class="col-md-2">
        <label>{{__('form.option')}} :</label>
    </div>
    <div class="col-md-4">
        <input type="hidden" class="oid" name="oid[]" value="{{$QO->id}}">
        <input type="text" value="{{$QO->option}}" class="form-control option" name="option[]" placeholder="{{__('form.option_en_placholder')}}">
    </div>
    <div class="col-md-4">
        <input type="text" value="{{$QO->bd_option}}" class="form-control bdoption" name="bdoption[]" placeholder="{{__('form.option_bn_placholder')}}">
    </div>
    <div class="col-md-1">
        <div class="bt-switch">
            <input type="hidden" name="ans[]" class="hi ans" value="{{$QO->correct}}">
            <input type="checkbox" class="chk" data-id="{{$QO->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$QO->correct == 1?"checked":""}} />
        </div>
    </div>
    <div class="col-md-1">
        <a style="cursor: pointer" id="dlt_{{$QO->id}}" class="m-4 delete_q {{$QO->correct?'disabled':'text-danger'}} " data-id="{{$QO->id}}"><i class="fas fa-trash"></i></a>
    </div>
</div>
@endforeach

<script>
    $(function() {
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
            var qid = $(this).data('id');
            if (state == true) {
                console.log(qid);
                $(this).closest("div.bt-switch").find(".hi").val('1');
                $('#dlt_'+qid).addClass('disabled').removeClass('text-danger');
            } else {
                console.log(qid);
                $(this).closest("div.bt-switch").find("input[name='ans[]']").val('0');
                $('#dlt_'+qid).removeClass('disabled').addClass('text-danger');
            }
        });

    })
</script>
